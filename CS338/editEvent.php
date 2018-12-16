<?php
	session_start();
?>
<!DOCTYPE php>
<!--Author:  Bryan Rumsey
	Date:	 November 08, 2018
	File:	 login.php
	Class:   CSCI 338: Software Engineering
	Purpose: Term Project: Weather Calendar
-->


<html>
	<head>
		<title>Edit Event</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>
		<?php

		//name of users event file
		$eventFileName = $_SESSION['firstName']."".$_SESSION['lastName'].".txt";
		//open users event file for reading
		$eventFile = fopen($eventFileName, "r");
		//open event temp file for writing
		$eventBackup = fopen("temp.txt", "w");

		//read each event
		while(!feof($eventFile)){
			//gets event data
			$event = fgets($eventFile);
			//split event data into elements 
			list() = explode(":", $event);
		}
		?>
	</body>
</html>