<?php

	require 'vendor/autoload.php';

	$time_stamp = (int)$_POST["time_stamp"];

	try {

		$connection = new MongoDB\Client("mongodb+srv://rjl9447:studentMongo!9447@cluster0-2pw84.mongodb.net/test?retryWrites=true");

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