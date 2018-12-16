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
		<title>Create Account</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>
		<?php
			//Receive User Name and password form index.php
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			$userName = $_POST['userName'];
			$password = $_POST['password'];
			$password2 = $_POST['confirm-password'];
			$usersName = $firstName." ".$lastName;

			//open users.txt
			$usersFile = fopen("users.txt","r");
			//get correct password for the indicated user
			while(!feof($usersFile)){
				$userData = fgets($usersFile);
				list($user, $pass, $fName, $lName, $newLine) = explode(":", $userData);
				if($userName == $user){
					$correctUser = $userName;
					$name = $fName." ".$lName;
				}
			}
			//close users.txt
			fclose($usersFile);

			if($correctUser == $userName){
				if($usersName == $name){
					echo '<script>window.location.href = "home.php?error=existingAccountError";</script>';
				}
				else{
					echo '<script>window.location.href = "home.php?error=uniqueUserError";</script>';
				}
			}
			elseif($password != $password2){	
				echo '<script>window.location.href = "home.php?error=passwordMismatchError";</script>';
			}
			else{
				//creates the session variables for the users name.
				//needed to access the users event file
				$_SESSION['firstName'] = $firstName;
				$_SESSION['lastName'] = $lastName;
				//opens the user sccount file
				$usersFile = fopen("users.txt","a");
				//adds the users account information to the account file
				fputs($usersFile, "$userName:$password:$firstName:$lastName:\n");
				//close users.txt
				fclose($usersFile);
				//creates the users event file
				$userEventFile = fopen("Users/".$firstName."".$lastName.".txt", "w");
				fclose($userEventFile);
				//change permission of the user file
				chmod("Users/".$firstName."".$lastName.".txt", 0777);
				//sends the user to their calendar page.
				echo '<script>window.location.href = "weather.php";</script>';
			}
		?>
	</body>

</html>