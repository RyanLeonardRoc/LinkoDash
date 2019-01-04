<?php

	require 'vendor/autoload.php';
	
	$operDict = [
    "=" => '$eq',
    "<" => '$lt',
    ">" => '$gt',
    "<=" => '$lte',
    ">=" => '$gte'
	];


	$filterData;
	$qry = array();
	
	if(isset($_POST)){
  
    $filterData = json_decode($_POST['myData']);
    //echo gettype($filterData);
    //print_r($filterData->entries);

    $entries = $filterData->entries;

    foreach ($entries as $value) {

    	$feature = $value->feature;
    	$operator = $value->operator;
    	$val = $value->value;

    	$mongoOperator = $operDict[$operator];

    	//echo $mongoOperator;

    	$qry[$feature] = array($mongoOperator => $val);

    }

	}



	try {

	$options = ['sort' => ['time_stamp' => -1]];

	$configs = include('config.php');

	$connection = new MongoDB\Client($configs['conn']);

	$db = $connection->linkodb;

	$collection = $db->linkocol;

	//print_r(json_encode($qry));

	$cursor = $collection ->find($qry, $options);



	$data = array();

	foreach ($cursor as $record) {

		$rowObj = new \stdClass();

		$ts = $record["time_stamp"];
		$cmd = preg_replace('/\\.[^.\\s]{3,4}$/', '', $record["commands_input_file"] );
		$date = $record["date_stamp"];
		$hour = $record["hour"];
		$minute = $record["minute"];
		$second = $record["second"];
		$meridiem = $record["meridiem"];

		$rowObj ->time_stamp = $ts;
		$rowObj ->cmd = $cmd;
		$rowObj ->date = $date;
		$rowObj ->hour = $hour;
		$rowObj ->minute = $minute;
		$rowObj ->second = $second;
		$rowObj ->meridiem = $meridiem;

		array_push($data, $rowObj);

	};

	//$arr = strip_slashes($data);

	echo json_encode($data);



	}
	catch(Exception $e) {
		echo $e;
	}


?>