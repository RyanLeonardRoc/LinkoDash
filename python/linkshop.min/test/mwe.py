#!/usr/bin/env python3

#TODO create config file for the following paths
#path to linkography dir
path_to_linkography = 'C:\\xampp\\htdocs\\LinkoDashV6\\python\\linkshop.min\\linkograph'
#path to test dir
path_to_test = 'C:\\xampp\\htdocs\\LinkoDashV6\\python\\linkshop.min\\test'

import os
import sys
sys.path.append(path_to_linkography)
sys.path.append('..')
import csv
import datetime
import json
import labels as llabels
import linkoCreate as llinkoCreate
import stats as lstats
import linkoDrawSVG as llinkoDrawSVG

os.chdir(path_to_test)


def stringToDatetime(in_string):
    tokens = in_string.split(" ")
    in_date = tokens[0]
    in_time = tokens[1]
    # date may be MM/DD/YYYY or YYYY-MM-DD
    if "/" in in_date:
        date_tokens = in_date.split("/")
        year = date_tokens[2]
        month = date_tokens[0]
        date = date_tokens[1]
    else:
        date_tokens = in_date.split("-")
        year = date_tokens[0]
        month = date_tokens[1]
        date = date_tokens[2]
    time_tokens = in_time.split(":")
    minute = time_tokens[1]
    second = time_tokens[2]
    # time may be 24 hour or AM/PM
    hour = int(time_tokens[0])
    if "AM" == tokens[2]:
        if 12 == hour:
            hour = 0
    elif "PM" == tokens[2]:
        if 12 != hour:
            hour += 12
    return datetime.datetime(int(year), int(month), int(date), hour, int(minute), int(second))


def processSession(session_filename, writer):

    #####################
    # generate linkograph
    #####################

    # label commands
    #label_rules = open("abstraction.json", "r")
    #labeler = llabels.Labeler(json.load(label_rules))
    #label_rules.close()

    label_rules = open("../../../php/uploads/input_abstraction.json", "r")
    labeler = llabels.Labeler(json.load(label_rules))
    label_rules.close()


    commands = open(session_filename, "r")
    json_commands = json.load(commands)
    commands.close()

    if 2 > len(json_commands):
        print("can't process", session_filename, "because session files must have at least two commands")
        return

    last_command = json_commands.pop()

    # access_next, look_next, transfer_next, move_next, execute_next, cleanup_next
    last_command_labels = labeler.labelCommands([last_command], "NoLabel")
    access_next = 0
    look_next = 0
    transfer_next = 0
    move_next = 0
    execute_next = 0
    cleanup_next = 0
    if "Access" in last_command_labels:
        access_next = 1
    if "Look" in last_command_labels:
        look_next = 1
    if "Transfer" in last_command_labels:
        transfer_next = 1
    if "Move" in last_command_labels:
        move_next = 1
    if "Execute" in last_command_labels:
        execute_next = 1
    if "Cleanup" in last_command_labels:
        cleanup_next = 1

    labeled = labeler.labelCommands(json_commands, "NoLabel")

    # @todo cleanup labeled.json when its safe
    llabels.writeLabelsToJsonFile(labeled, "labeled.json")

    # link commands
    # RYAN ADDED TRY-CATCH
    try:

        ontology = open("../../../php/uploads/input_ontology.json", "r")
        inv_labeling = open("labeled.json", "r")
        lg = llinkoCreate.createLinko(json.load(inv_labeling), json.load(ontology))
        inv_labeling.close()
        os.remove("labeled.json")
        ontology.close()
    except:
        print('an error occured')


    llinkoCreate.writeLinkoJson(lg, 'linko.json')

    #linkSVG
    # '../../../php/uploads/input_commands.json'
    svgString = llinkoDrawSVG.linkoDrawSVG(lg, '../../../php/uploads/input_commands.json')
    print(svgString)

    test_output = open("test_output.txt", "w")
    test_output.write(svgString)
    test_output.close()

    ##################
    # extract features
    ##################

    # node_count
    node_count = len(lg)

    # critical_node_count
    #     @todo: pick something real for critical_threshold
    critical_threshold = node_count / 2
    critical_node_count = lstats.countCriticalNodes(lg, critical_threshold)

    # x_bar, Sigma_x, range_x, y_bar, Sigma_y, range_y
    x_bar, Sigma_x, range_x, y_bar, Sigma_y, range_y = lstats.calculateCartesianStatistics(lg)

    # percentage_of_links
    percentage_of_links = lstats.percentageOfLinks(lg)

    # entropy
    entropy = lstats.graphEntropy(lg)

    # T-Complexity
    encoded_lg = lstats.linkographToString(lg)
    t_complexity = lstats.tComplexity(encoded_lg)

    # link_index
    link_index = lstats.links(lg) / len(lg)

    # graph differences
    graph_differences = lstats.summaryDifference(lg)

    # entropy deviation
    entropy_deviation = lstats.entropyDeviation(lg)

    # mean link coverage
    mean_link_coverage = lstats.meanLinkCoverage(lg)

    # top cover
    top_cover = lstats.topCover(lg)

    first_command = json_commands[0]
    first_datetime = stringToDatetime(first_command['ts'])
    session_start_time = first_datetime.hour * 3600 + first_datetime.minute * 60 + first_datetime.second

    # session_length_seconds, mean_delay_seconds
    last_command = json_commands[-1]
    last_datetime = stringToDatetime(last_command['ts'])
    session_length_timedelta = last_datetime - first_datetime
    session_length_seconds = session_length_timedelta.total_seconds()
    if 1 < len(lg):
        mean_delay_seconds = session_length_seconds / (len(lg) - 1)
    else:
        mean_delay_seconds = None

    # access_ratio, look_ratio, transfer_ratio, move_ratio, execute_ratio, cleanup_ratio
    access_ratio = look_ratio = transfer_ratio = move_ratio = execute_ratio = cleanup_ratio = 0
    if "Access" in labeled.keys():
        access_ratio = len(labeled['Access']) / len(lg)
    if "Look" in labeled.keys():
        look_ratio = len(labeled['Look']) / len(lg)
    if "Transfer" in labeled.keys():
        transfer_ratio = len(labeled['Transfer']) / len(lg)
    if "Move" in labeled.keys():
        move_ratio = len(labeled['Move']) / len(lg)
    if "Execute" in labeled.keys():
        execute_ratio = len(labeled['Execute']) / len(lg)
    if "Cleanup" in labeled.keys():
        cleanup_ratio = len(labeled['Cleanup']) / len(lg)
    
    #################
    # persist in .csv
    #################
    writer.writerow([node_count, critical_node_count, x_bar, Sigma_x, range_x, y_bar, Sigma_y, range_y, percentage_of_links, entropy, t_complexity, link_index, graph_differences, entropy_deviation, mean_link_coverage, top_cover, session_start_time, session_length_seconds, mean_delay_seconds, access_ratio, look_ratio, transfer_ratio, move_ratio, execute_ratio, cleanup_ratio, access_next, look_next, transfer_next, move_next, execute_next, cleanup_next])



if "__main__" == __name__:


    try:
        # open CSV and write column headers
        csv_file = open("session_features.csv", "w", newline="")
        writer = csv.writer(csv_file)
        writer.writerow(["node_count", "critical_node_count", "x_bar", "Sigma_x", "range_x", "y_bar", "Sigma_y", "range_y", "percentage_of_links", "entropy", "t_complexity", "link_index", "graph_differences", "entropy_deviation", "mean_link_coverage", "top_cover", "session_start_time", "session_length_seconds", "mean_delay_seconds", "access_ratio", "look_ratio", "transfer_ratio", "move_ratio", "execute_ratio", "cleanup_ratio", "access_next", "look_next", "transfer_next", "move_next", "execute_next", "cleanup_next"])
        processSession("../../../php/uploads/input_commands.json", writer)
        # close CSV
        csv_file.close()

        if not os.path.isfile("session_features.csv"):
            print("extractSessionFeatures unit test failed")
            exit()

        print("unit test: OK")
    except Exception as e:
        print(e)
        print('Something went wrong')
        print("ERROR")

    

