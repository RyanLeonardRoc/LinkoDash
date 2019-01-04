<?php

	require 'vendor/autoload.php';

	$username =  $_POST["username"];
	$password =  $_POST["password"];


	$hashed_password = password_hash($password, PASSWORD_DEFAULT);

	$configs = include('config.php');

	$connection = new MongoDB\Client($configs['conn']);

	$db = $connection->linkodb;

	$collection = $db->accountcol;
 
	 $insertManyResult = $collection->insertMany([
        [

        	'username' => $username,
        	'password' => $hashed_password
        ]
    ]);
	
?>