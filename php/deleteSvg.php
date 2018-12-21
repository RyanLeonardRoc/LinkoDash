<?php
	require 'vendor/autoload.php';

	$time_stamp =  (int)$_POST["time_stamp"];


	try {

		$connection = new MongoDB\Client("mongodb+srv://rjl9447:studentMongo!9447@cluster0-2pw84.mongodb.net/test?retryWrites=true");

		$db = $connection->linkodb;

		$collection = $db->linkocol;

		$deleteResult = $collection->deleteMany(['time_stamp' => $time_stamp]);

		echo "DELETED: ". $deleteResult->getDeletedCount();
	}
	catch (Exception $e) {
		echo $e;
	}

?>