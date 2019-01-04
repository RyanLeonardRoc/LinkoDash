<?php
	require 'vendor/autoload.php';

	$time_stamp =  (int)$_POST["time_stamp"];


	try {

		$configs = include('config.php');

		$connection = new MongoDB\Client($configs['conn']);

		$db = $connection->linkodb;

		$collection = $db->linkocol;

		$deleteResult = $collection->deleteMany(['time_stamp' => $time_stamp]);

		echo "DELETED: ". $deleteResult->getDeletedCount();
	}
	catch (Exception $e) {
		echo $e;
	}

?>