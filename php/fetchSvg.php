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
	           	'svg' => 1,
	           	'commands_input_file' => 1
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