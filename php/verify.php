<?php

	$username =  $_POST["username"];
	$password =  $_POST["password"];

	require 'vendor/autoload.php';

	/*
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	echo $hashed_password;


	printf("\n");

	$hashed_password2 = password_hash($password, PASSWORD_DEFAULT);
	echo $hashed_password2;

	if(password_verify($password, $hashed_password2)) {

		echo "true";

	}
	*/

	$connection = new MongoDB\Client("mongodb+srv://rjl9447:studentMongo!9447@cluster0-2pw84.mongodb.net/test?retryWrites=true");

	$db = $connection->linkodb;

	$collection = $db->accountcol;

	//TODO specify this query
	$cursor = $collection ->find(
	[

		'username' => $username

	],
	[


	]

	);

	foreach ($cursor as $value) {

		

		if (password_verify($password, $value["password"]))  {

			echo "true";

		}
		else {

			echo "false";

		}

		//echo $value["password"];
			
	
	}
		

	
?>