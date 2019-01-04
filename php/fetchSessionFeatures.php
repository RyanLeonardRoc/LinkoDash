<?php

	require 'vendor/autoload.php';

	$time_stamp = (int)$_POST["time_stamp"];

	try {

		$configs = include('config.php');

		$connection = new MongoDB\Client($configs['conn']);

		$db = $connection->linkodb;

		$collection = $db->linkocol;

		$cursor = $collection ->find(

		[
			'time_stamp' => $time_stamp
		],

		[
			
			'projection' => [
	            '_id' => 0,
	           	'svg' => 0,
	           	'abstraction' => 0,
	           	'ontology' => 0,
	           	'commands' => 0,
	           	'abstraction_input_file' => 0,
	           	'ontology_input_file' => 0,
	           	'commands_input_file' => 0,
	           	'date_stamp' => 0,
	           	'day' => 0,
	           	'day_of_week' => 0,
	           	'hour' => 0,
	           	'minute' => 0,
	           	'month' => 0,
	           	'meridiem' => 0,
	           	'year' => 0,
	           	'time_stamp' => 0
	         

	        ],


		]


		);


		$return = array();

		foreach ($cursor as $value) {

			array_push($return, $value);
			
		}

		echo json_encode($return);

	}
	catch(Exception $e) {
		echo $e;
	}


?>