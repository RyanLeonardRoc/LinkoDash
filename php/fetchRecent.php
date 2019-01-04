<?php
// returns previous entries to dash
require 'vendor/autoload.php';

$configs = include('config.php');

$connection = new MongoDB\Client($configs['conn']);

$db = $connection->linkodb;

$collection = $db->linkocol;

$options = ['sort' => ['time_stamp' => -1]];

//TODO specify this query
$cursor = $collection ->find([], $options);

$data = array();

foreach ($cursor as $record) {

	$rowObj = new \stdClass();

	$ts = $record["time_stamp"];
	$cmd = preg_replace('/\\.[^.\\s]{3,4}$/', '', $record["commands_input_file"] );
	$date = json_encode($record["date_stamp"]);
	$hour = $record["hour"];
	$minute = $record["minute"];
	$second = $record["second"];
	$meridiem = json_encode($record["meridiem"]);

	$rowObj ->time_stamp = $ts;
	$rowObj ->cmd = $cmd;
	$rowObj ->date = $date;
	$rowObj ->hour = $hour;
	$rowObj ->minute = $minute;
	$rowObj ->second = $second;
	$rowObj ->meridiem = $meridiem;

	array_push($data, json_encode($rowObj));

};

echo json_encode($data);



?>