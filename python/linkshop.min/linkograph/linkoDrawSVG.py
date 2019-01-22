#!/usr/bin/env python3
import sys
sys.path.append("..")
import argparse  # For command line parsing.
import json
import re  # for replacing invalid html characters.
import linkoCreate
import stats

def linkoDrawSVG(linkograph, labels=True,
                 lineNumbers=True, commands=None,
                 dotRadius=3, circWidth=3, step=10,
                 lineWidth=2, leftOffset=2, labelDist=10,
                 labelBase=5):
    """ Draws an SVG version of a linkograph. 

    linkograph -- the linkograph to draw
    commands -- the command dictionary (usually read in from a json)

    """

    # Find the longest link.
    linkwidth = max(stats.linkDifference(linkograph))

    # Calculate the label width.
    labelwidth = 2 # Starting with a buffer
    if labels:
        labelwidth += max({len(' '.join(e[0])) for e in linkograph})

    if lineNumbers:
        labelwidth += len(str(len(linkograph)))

    if commands is not None:
        labelwidth += max({len(e['cmd']) for e in commands})

    totalWidth = (linkwidth*step + labelwidth*10 + labelDist*2 + labelBase)

    height = 2*len(linkograph)*step

    # Determine the size of the linkograph.
    ysize = height
    xsize = totalWidth + leftOffset*step


    # The x coordinate of the last label's dot.
    xStart=(linkwidth + leftOffset)*step

    # The y coordinate of the last label's dot.
    yStart=10

    # Font type.
    fontString='Times-Roman'

    # Font size as string.
    fontSize=15

    result = ""

    # Define SVG header.
    style = 'xmlns="http://www.w3.org/2000/svg"'
    result+='<svg {} width="{}" height="{}">\n'.format(style,xsize,ysize)
    depth = 0

    for (lineNumber, line) in enumerate(linkograph):

        # Print the node.
        result += circle(circWidth, xStart, yStart, dotRadius,
                         'node{}'.format(depth))

        # Print the links.
        result += printLinks(line[2], step, depth, xStart, yStart,
                                dotRadius, circWidth, lineWidth)

        result+=printLabel(xStart+labelDist, yStart+labelBase, line[0],
                       labels, depth, lineNumbers, commands)

        depth += 1

        # Move the start position up one step
        # and reset position.
        yStart += 2*step

     # svg footer.
    result+='</svg>\n'

    return result

def printLinks(links, step, depth, xStart, yStart,
                  dotRadius, circWidth, lineWidth):
    """Prints the links, including line segments and dots.

    Prints the links assuming that depth is the initial node and the
    terminal nodes are in links.

    """

    svgLinks = ""

    for l in links:
        difference = abs(depth - l)
    
        # Print the dot.
        svgLinks += circle(circWidth, xStart-difference*step,
                           yStart+difference*step, dotRadius,
                           '{}link{}'.format(depth, l))

        # Print the forelink segment.
        svgLinks += lineSegment(lineWidth,
                                xStart,
                                yStart,
                                xStart - difference*step,
                                yStart + difference*step,
                                '{}flink{}'.format(depth, l))

        # Print the backlink segment.
        svgLinks += lineSegment(lineWidth,
                                xStart - difference*step,
                                yStart + difference*step,
                                xStart,
                                yStart + 2*difference*step,
                                '{}blink{}'.format(depth, l))

    return svgLinks

def circle(circWidth, x, y, dotRadius, idField):
    """Draw a circle."""

    return ('<circle stroke="#333EFF" stroke-width="{}" fill="#333EFF"\n' #change node color here
            '        cx="{}" cy="{}" r="{}"'
            ' id="{}" />\n').format(circWidth, x, y, dotRadius, idField)


def lineSegment(lineWidth, x1, y1, x2, y2, idField):
    """Draw a line segment."""

    return ('<line stroke="#000000" stroke-width="{}"\n' #change segment color here
            '      x1="{}" y1="{}" x2="{}" y2="{}"'
            ' id="{}" />\n').format(lineWidth,
                                    x1, y1, x2, y2,
                                    idField)

def printLabel(xStart, yStart, labels, printLabels, lineNumber,
               printNodeNumbers, commands):
    """ Handles printing the lables.

    xStart -- The starting x coordinate
    yStart -- The starting y coordinate
    labels -- the labels of the node
    printLabels -- true prints the labels, false does not.
    lineNumber -- the current line number.
    printNodeNumbers -- true prints the node numbers, false does not.
    commands -- If not None, print the commands.

    """

    if not printLabels and not printNodeNumbers and (commands is None):
        return ""

    labelString = ""

    # gather together the information to print.
    info = []
    if printNodeNumbers:
        labelString += str(lineNumber) + ': '

    if printLabels:
        info.extend(labels)

    if commands is not None:
        info.append(commands[lineNumber]['cmd'])

    delimiterString = ', '
    for labelEntry in info:
        labelString += labelEntry + delimiterString

    # Before adding the labelString replace invalide html strings.
    labelString = re.sub('&', '&amp;', labelString)
    labelString = re.sub('<', '&lt;', labelString)
    labelString = re.sub('>', '&gt;', labelString)

    labelString = labelString[:-len(delimiterString)]

    # Define the tag
    preTag = '<text x="{}" y="{}" fill="black">'.format(xStart, yStart) #change label text color here
    postTag ='</text>\n'

    return preTag + labelString + postTag
    

