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
		<title>Validate User</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>
		<?php
			//Receive User Name and password form home.php
			$validationCode = $_POST['validationCode'];
			if($_SESSION['key'] == $validationCode){
				echo '<script>window.location.href = "home.php?phase=2";</script>';
			}
			else{
				echo '<script>window.location.href = "home.php?error=resetValidationError";</script>';
			}
		?>
	</body>

</html>
