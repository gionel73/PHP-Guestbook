<?php
	require_once('settings.php');
	switch($dbtype){
		case 'mysql':
			$dbconn = "mysql:host=$dbhost;dbname=$dbname";
			break;
		case 'sqlite':
			"sqlite:$dbpath";
			break;
	}
	
	try{
		$conn = new PDO($dbconn, $dbuser, $dbpass);
	}
	catch(PDOException  $pe){
		 die('Error connecting to database: ' . $pe->getMessage());
	}