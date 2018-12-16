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
		<title>Reset Password</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>
		<?php
			$userName = $_SESSION['userName'];
			$newPassword = $_POST['newPassword'];
			$confirmPassword = $_POST['confirmPassword'];
			if($newPassword == $confirmPassword){
				$usersFile = fopen("users.txt","r");
				$usersBackup = fopen("usersBackup.txt", "w");
				
				//get correct password for the indicated user
				while(!feof($usersFile)){
					$userData = fgets($usersFile);
					list($user, $pass, $fName, $lName) = explode(":", $userData);
					if($userName == $user){
						$targetUser = $user;
						$targetPass = $pass;
						$targetFName = $fName;
						$targetLName = $lName;
					}
					else{
						fwrite($usersBackup, "$userData");
					}
				}
				//close users.txt
				fclose($usersFile);
				
				$targetPass = $newPassword;
				fputs($usersBackup, "$targetUser:$targetPass:$targetFName:$targetLName:\n");
				
				fclose($usersBackup);

				$usersFile = fopen("users.txt","w");
				$usersBackup = fopen("usersBackup.txt", "r");
				while(!feof($usersBackup)){
					$userData = fgets($usersBackup);
					fwrite($usersFile, "$userData");
				}
				fclose($usersFile);
				fclose($usersBackup);

				$usersBackup = fopen("usersBackup.txt", "w");
				fwrite($usersBackup, "\n");
				fclose($usersBackup);

				session_destroy();
				echo '<script>window.location.href = "home.php";</script>';
			}
			else{
				echo '<script>window.location.href = "home.php?error=resetPasswordError";</script>';
			}
		?>
	</body>

</html>