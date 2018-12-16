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
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>
		<?php
			//Receive User Name and password form home.php
			$userName = $_POST['userName'];
			$password= $_POST['password'];
				
			//open users.txt
			$usersFile = fopen("users.txt","r");
			//get correct password for the indicated user
			while(!feof($usersFile)){
				$userData = fgets($usersFile);
				list($user, $pass, $firstName, $lastName, $newLine) = explode(":", $userData);
				if($userName == $user){
					$correctUser = $userName;
					$correctPass = $pass;
					$_SESSION['firstName'] = $firstName;
					$_SESSION['lastName'] = $lastName;

				}
			}
			//close users.txt
			fclose($usersFile);
			
			if(empty($correctUser)){
				echo '<script>window.location.href = "home.php?error=loginUserError";</script>';
			}
			//check that password matchs the correct password for the user
			//if it doesn't match print an error message and return to the home page
			if($password != $correctPass){	
				echo '<script>window.location.href = "home.php?error=loginPassError";</script>';
			}
			//if it does match welcome the administrator and allow them to add new vet information
			else{	
				echo '<script>window.location.href = "weather.php";</script>';
			}
		?>
	</body>

</html>
