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
		<title>Add Event</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>
		<?php
			//Receive event data
			$title = $_POST['EventTitle'];
			$day = $_POST['day'];
			$month = $_POST['month'];
			$year = $_POST['year'];
			$location = $_POST['location'];
			$description = $_POST['description'];
			//$time = $_POST['$eventTime'];
			//if($time != AllDay){
			//	list($hour, $min) = explode(":", $time);
			//	list($min, $dayHalf) = explode(" ", $min);
			//}

			//the users event file name
			$eventFileName = "Users/".$_SESSION['firstName']."".$_SESSION['lastName'].".txt";
			//open the users event file
			$eventFile = fopen($eventFileName,"a");
			//add the event to the event file
			fputs($eventFile, "$title:$day:$month:$year:$location:$description:\n");
			//close users event file
			fclose($eventFile);
			echo '<script>window.location.href = "weather.php";</script>';
		?>
	</body>
</html>
