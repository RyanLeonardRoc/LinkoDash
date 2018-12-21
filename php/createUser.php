<?php

	require 'vendor/autoload.php';

	$username =  $_POST["username"];
	$password =  $_POST["password"];


	$hashed_password = password_hash($password, PASSWORD_DEFAULT);

	$connection = new MongoDB\Client("mongodb+srv://rjl9447:studentMongo!9447@cluster0-2pw84.mongodb.net/test?retryWrites=true");

	$db = $connection->linkodb;

	$collection = $db->accountcol;
 
	 $insertManyResult = $collection->insertMany([
        [

        	'username' => $username,
        	'password' => $hashed_password
        ]
    ]);
	
?>