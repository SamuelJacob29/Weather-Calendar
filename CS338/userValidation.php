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
		<title>Identify User</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>
		<?php
			//Receive User Name and password form home.php
			$_SESSION['userName'] = $_POST['userName'];
			//open users.txt
			$usersFile = fopen("users.txt","r");
			//get correct password for the indicated user
			while(!feof($usersFile)){
				$userData = fgets($usersFile);
				list($user, $newLine) = explode(":", $userData);
				if($_SESSION['userName'] == $user){
					$correctUser = $_SESSION['userName'];
				}
			}
			//close users.txt
			fclose($usersFile);

			$char = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","0","1","2","3","4","5","6","7","8","9");
			for($i = 0; $i < 6; $i++){
				$key = $key.$char[rand(0, 63)];
			}
			$_SESSION['key'] = $key;
			if(empty($correctUser)){
				session_destroy();
				echo '<script>window.location.href = "home.php?error=resetUserError";</script>';
			}
			else{

				mail($_SESSION['userName'], "Reset Password", $_SESSION['key']);
				echo '<script>window.location.href = "home.php?phase=1";</script>';
			}
		?>
	</body>

</html>
