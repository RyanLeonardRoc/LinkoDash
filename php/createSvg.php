<?php


// something for the driver. don't really understand it but its neccessary. used 'composer' to retrieve the files
require 'vendor/autoload.php';

date_default_timezone_set('America/New_York');


//clear upload directory
$files = glob('uploads/*'); 
foreach($files as $file){ 
  if(is_file($file))
    unlink($file);
}

//print_r($_FILES);

// set dir for temp json files that are to be used to create linkograph
$target_dir = "uploads/";

$uploadOk = true;

//if the temp dir is being cleared properly, there should never be a repeat unless glob didnt work.
if (file_exists($target_dir .'input_abstraction.json') || file_exists($target_dir .'input_ontology.json') || file_exists($target_dir. "input_commands.json")) {
    echo "Sorry, file already exists. There should not be any files in the directory as it is *supposed* to be cleared at the begining of every upload. Therefore, something went horribly wrong. Check the */uploads* directory.";
    $uploadOk = false;
}

$abstraction_file = $_FILES['abstraction']['tmp_name'];
$ontology_file = $_FILES['ontology']['tmp_name'];
$command_file = $_FILES['commands']['tmp_name'];
$timestamp = time(); // this may seem out of place but its not :) 
$date = date("Y-m-d");
$year = date('Y');
$month = date('F');
$day = date('j');
$day_of_week = date('l');
$hour = date('h');
$minute = date('i');
$second = date('s');
$meridiem = date('A');


if ($uploadOk == false) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
else {
    
    if (move_uploaded_file($abstraction_file, $target_dir .'input_abstraction.json')) {
        //echo "The file ". basename( $abstraction_file). " has been uploaded.<br>";
    } else {
        echo "Sorry, there was an error uploading file: ". basename( $_FILES["abstraction"]. "<br>");
    }

    if (move_uploaded_file($ontology_file, $target_dir .'input_ontology.json')) {
        //echo "The file ". basename( $ontology_file ). " has been uploaded.<br>";
    } else {
        echo "Sorry, there was an error uploading file: ". basename( $_FILES["ontology"]. "<br>");
    }

    if (move_uploaded_file($command_file, $target_dir .'input_commands.json')) {
        //echo "The file ". basename( $command_file ). " has been uploaded.<br>";
    } else {
        echo "Sorry, there was an error uploading file: ". basename( $_FILES["commands"]. "<br>");
    }

}

//run python scripts and push output to files
//TODO find a way to stop handling data on failure... DONE but could probably be done better

try {
  
	$result = shell_exec("python ../python/linkshop.min/test/mwe.py");
 
    if (strpos($result, '<svg') !== false) { //do not close the tag <--
        handleData($timestamp, $date, $year, $month, $day, $day_of_week, $hour, $minute, $second, $meridiem);
    }
  

}
catch(Exception $e) {

	echo $e;

}

//TODO god method atm. refactor
function handleData ($timestamp, $date, $year, $month, $day, $day_of_week, $hour, $minute, $second, $meridiem) {

    $target_dir = "uploads/"; //no globals in php?
    // session output vars

    $node_count;
    $critical_node_count;
    $x_bar;
    $sigma_x;
    $range_x;
    $y_bar;
    $sigma_y;
    $range_y;
    $percentage_of_links;
    $entropy;
    $t_complexity;
    $link_index;
    $graph_differences;
    $entropy_deviation;
    $mean_link_coverage;
    $top_cover;
    $session_start_time;
    $session_length_seconds;
    $mean_delay_seconds;
    $access_ratio;
    $look_ratio;
    $transfer_ratio;
    $move_ratio;
    $execute_ratio;
    $cleanup_ratio;
    $access_next;
    $look_next;
    $transfer_next;
    $move_next;
    $execute_next;
    $cleanup_next;


    try {

        if (($handle = fopen("../python/linkshop.min/test/session_features.csv", "r")) !== FALSE) {
          fgetcsv($handle, 1000, ","); // ignore first line. retrieve it, but do nothing
          while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            #echo "count: ". $num;

            $node_count = $data[0];
            $critical_node_count = $data[1];
            $x_bar = number_format($data[2], 2);
            $sigma_x = number_format($data[3], 2);
            $range_x = number_format($data[4], 2);
            $y_bar = number_format($data[5], 2);
            $sigma_y = number_format($data[6], 2);
            $range_y = number_format($data[7], 2);
            $percentage_of_links = number_format($data[8], 2);
            $entropy = number_format($data[9], 2);
            $t_complexity = number_format($data[10], 2);
            $link_index = number_format($data[11], 2);
            $graph_differences = number_format($data[12], 2);
            $entropy_deviation = number_format($data[13], 2);
            $mean_link_coverage = number_format($data[14], 2);
            $top_cover = number_format($data[15], 2);
            $session_start_time = number_format($data[16], 2);
            $session_length_seconds = number_format($data[17], 2);
            $mean_delay_seconds = number_format($data[18], 2);
            $access_ratio = number_format($data[19], 2);
            $look_ratio = number_format($data[20], 2);
            $transfer_ratio = number_format($data[21], 2);
            $move_ratio = number_format($data[22], 2);
            $execute_ratio = number_format($data[23], 2);
            $cleanup_ratio = number_format($data[24], 2);
            $access_next = $data[25];
            $look_next = $data[26];
            $transfer_next = $data[27];
            $move_next = $data[28];
            $execute_next = $data[29];
            $cleanup_next = $data[30];

          }
          fclose($handle);
        }

    }
    catch(Exception $ee) {
        echo $ee;
    }


    // verify that extention is loaded
    //echo extension_loaded("mongodb") ? "mongodb extension loaded\n" : "mongodb extension not loaded\n";
    //echo "php version: ". phpversion();


    $configs = include('config.php');

    $connection = new MongoDB\Client($configs['conn']);

    //$connection = new MongoDB\Client();

    if(is_null($connection )) {

        echo "connection is null";
    }
    else {

        //echo "connection is not null";
    }

    $db = $connection->linkodb;

    $collection = $db->linkocol;

    $abstraction_json = json_decode(file_get_contents($target_dir. "input_abstraction.json"), true);
    $ontology_json = json_decode(file_get_contents($target_dir. "input_ontology.json"), true);
    $commands_json = json_decode(file_get_contents($target_dir. "input_commands.json"), true);

    

    $insertManyResult = $collection->insertMany([
        [

            'abstraction' => $abstraction_json,
            'ontology' => $ontology_json,
            'commands' => $commands_json,
            'abstraction_input_file' => $_FILES["abstraction"]["name"],
            'ontology_input_file' => $_FILES["ontology"]["name"],
            'commands_input_file' => $_FILES["commands"]["name"],
            'svg' => file_get_contents("../python/linkshop.min/test/test_output.txt"),
            'year' => $year,
            'month' => $month,
            'day' => $day,
            'day_of_week' => $day_of_week,
            'hour' => $hour,
            'minute' => $minute,
            'second' => $second,
            'meridiem' => $meridiem,
            'node_count' => $node_count,
            'critical_node_count' => $critical_node_count,
            'x_bar' => $x_bar,
            'sigma_x' => $sigma_x,
            'range_x' => $range_x,
            'y_bar' => $y_bar,
            'sigma_y' => $sigma_y,
            'range_y' => $range_y,
            'percentage_of_links' => $percentage_of_links,
            'entropy' => $entropy,
            't_complexity' => $t_complexity,
            'link_index' => $link_index,
            'graph_differences' => $graph_differences,
            'entropy_deviation' => $entropy_deviation,
            'mean_link_coverage' => $mean_link_coverage,
            'top_cover' => $top_cover,
            'session_start_time' => $session_start_time,
            'session_length_seconds' => $session_length_seconds,
            'mean_delay_seconds' => $mean_delay_seconds,
            'access_ratio' => $access_ratio,
            'look_ratio' => $look_ratio,
            'transfer_ratio' => $transfer_ratio,
            'move_ratio' => $move_ratio,
            'execute_ratio' => $execute_ratio,
            'cleanup_ratio' => $cleanup_ratio,
            'access_next' => $access_next,
            'look_next' => $look_next,
            'transfer_next' => $transfer_next,
            'move_next' => $move_next,
            'execute_next' => $execute_next,
            'cleanup_next' => $cleanup_next,
            'date_stamp' => $date,
            'time_stamp' => $timestamp

        ]
    ]);

    //printf("Inserted %d document(s)\n", $insertManyResult->getInsertedCount());

    //var_dump($insertManyResult->getInsertedIds());
    

    $retObj = new \stdClass();
    $retObj->time_stamp = $timestamp;
    $retObj->date = $date;
    $retObj->hour = $hour;
    $retObj->minute = $minute;
    $retObj->second = $second;
    $retObj->meridiem = $meridiem;
    $retObj->cmd = $_FILES["commands"]["name"];
    $retJson = json_encode($retObj);
    echo $retJson;
    


}


?>