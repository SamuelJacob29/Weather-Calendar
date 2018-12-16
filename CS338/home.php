<?php
	session_start();
?>
<!DOCTYPE php>
<!--Author:  Bryan Rumsey
	Date:	 November 06, 2018
	File:	 home.php
	Class:   CSCI 338: Software Engineering
	Purpose: Term Project: Weather Calendar
-->

<html>
	<head>
		<title>Weather Calendar Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="weatherHome.css"/>
		<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	</head>

	<body>

		<h1>The Weather Calendar</h1>
		<div class="optionsBar">
			<button class="reset" onclick="document.getElementById('id03').style.display='block'">Reset Password</button>
			<button class="login" onclick="document.getElementById('id01').style.display='block'">Login</button>
			<button class="account" onclick="document.getElementById('id02').style.display='block'">Create Account</button>
		</div>

		<div id="id01" class="modal">  
			<form class="modal-content animate" action="login.php" method="post">
				<div class="container">
					<label for="userName"><b>Username</b></label>
					<input type="text" placeholder="Enter Username" name="userName" required>
					<div class="errorBar">
						<?php
							if($_GET['error'] == "loginUserError")
								print_r("I'm sorry, we don't have an account for the user name you entered!");
						?>
					</div>
						<label for="password"><b>Password</b></label>
						<input type="password" placeholder="Enter Password" name="password" required>
					<div class="errorBar">
						<?php
							if($_GET['error'] == "loginPassError")
								print_r("I'm sorry, the password you entered was incorrect!");
						?>
					</div>
					<button type="submit">Login</button>
				</div>
				<div class="container" style="background-color:#f1f1f1">
					<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
				</div>
			</form>
		</div>

		<div id="id02" class="modal">  
			<form class="modal-content animate" action="createAccount.php" method="post">
				<div class="container">
					<label for="firstName"><b>First Name</b></label>
					<input type="text" placeholder="Enter First Name" name="firstName" required>
					<label for="lastName"><b>Last Name</b></label>
					<input type="text" placeholder="Enter Last Name" name="lastName" required>
					<label for="userName"><b>Username</b></label>
					<input type="email" placeholder="Enter Username" name="userName" required>
					<div class="errorBar">
						<?php
							if($_GET['error'] == "existingAccountError")
								print_r("I'm sorry, you already have an account with our site!");
							elseif($_GET['error'] == "uniqueUserError")
								print_r("I'm sorry, That user name is already in use!");
						?>
					</div>
					<label for="password"><b>Password</b></label>
					<input type="password" pattern=".{8,12}" placeholder="Enter Password (8-12 Characters)" name="password" required>
					<label for="confirm-password"><b>Confirm Password</b></label>
					<input type="password" pattern=".{8,12}" placeholder="Re-Enter Password" name="confirm-password" required>
					<div class="errorBar">
						<?php
							if($_GET['error'] == "passwordMismatchError")
								print_r("I'm sorry, the passwords you entered does not match!");
						?>
					</div>
					<button type="submit">Create Account</button>
				</div>
				<div class="container" style="background-color:#f1f1f1">
					<button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
				</div>
			</form>
		</div>

		<div id="id03" class="modal">  
			<form class="modal-content animate" action="userValidation.php" method="post">
				<div class="container">
					<label for="userName"><b>Username</b></label>
					<input type="text" placeholder="Enter Username" name="userName" required>
					<div class="errorBar">
						<?php
							if($_GET['error'] == "resetUserError")
								print_r("I'm sorry, we don't have an account for the user name you entered!");
						?>
					</div>
					<button type="submit">Submit Username</button>
				</div>
				<div class="container" style="background-color:#f1f1f1">
					<button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
				</div>
			</form>
		</div>

		<div id="id04" class="modal">  
			<form class="modal-content animate" action="validationCode.php" method="post">
				<div class="container">
					<label for="validationCode"><b>Validation Code</b></label>
					<input type="text" placeholder="Enter Validation Code" name="validationCode" required>
					<div class="errorBar">
						<?php
							if($_GET['error'] == "resetValidationError")
								print_r("I'm sorry, the validation code you entered does not match!");
						?>
					</div>
					<button type="submit">Verify Validation Code</button>
				</div>
				<div class="container" style="background-color:#f1f1f1">
					<button type="button" onclick="document.getElementById('id04').style.display='none'" class="cancelbtn">Cancel</button>
				</div>
			</form>
		</div>

		<div id="id05" class="modal">  
			<form class="modal-content animate" action="resetPassword.php" method="post">
				<div class="container">
					<label for="newPassword"><b>New Password</b></label>
					<input type="password" pattern=".{8,12}" placeholder="Enter New Password (8-12 Characters)" name="newPassword" required>
					<label for="confirmPassword"><b>Confirm Password</b></label>
					<input type="password" pattern=".{8,12}" placeholder="Re-Enter New Password" name="confirmPassword" required>
					<div class="errorBar">
						<?php
							if($_GET['error'] == "resetPasswordError")
								print_r("I'm sorry, the passwords you entered do not match!");
						?>
					</div>
					<button type="submit">Reset Password</button>
				</div>
				<div class="container" style="background-color:#f1f1f1">
					<button type="button" onclick="document.getElementById('id05').style.display='none'" class="cancelbtn">Cancel</button>
				</div>
			</form>
		</div>

	
		<script>
		// Get the modals
			var modal = document.getElementById('id01');
			var modal2 = document.getElementById('id02');
			var modal3 = document.getElementById('id03');
			var modal4 = document.getElementById('id04');
			var modal5 = document.getElementById('id05');

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == modal) {
						modal.style.display = "none";
				}
				else if (event.target == modal2) {
						modal2.style.display = "none";
				}
				else if (event.target == modal3) {
						modal3.style.display = "none";
				}
				else if (event.target == modal4) {
						modal4.style.display = "none";
				}
				else if (event.target == modal5) {
						modal5.style.display = "none";
				}
			}
		</script>
		
		<?php 
			if($_GET['error'] == 'loginPassError' || $_GET['error'] == 'loginUserError'){
				echo "<script type='text/javascript'>";
				echo "$(window).load(function(){
					$('#id01').modal('show');});";
				echo "</script>";
			}
			else if($_GET['error'] == 'passwordMismatchError' || $_GET['error'] == 'existingAccountError' || $_GET['error'] == 'uniqueUserError'){
				echo "<script type='text/javascript'>";
				echo "$(window).load(function(){
					$('#id02').modal('show');});";
				echo "</script>";
			}
			else if($_GET['error'] == 'resetUserError'){
				echo "<script type='text/javascript'>";
				echo "$(window).load(function(){
					$('#id03').modal('show');});";
				echo "</script>";
			}
			else if($_GET['error'] == 'resetValidationError'){
				echo "<script type='text/javascript'>";
				echo "$(window).load(function(){
					$('#id04').modal('show');});";
				echo "</script>";
			}
			else if($_GET['error'] == 'resetPasswordError'){
				echo "<script type='text/javascript'>";
				echo "$(window).load(function(){
					$('#id04').modal('show');});";
				echo "</script>";
			}

			if($_GET['phase'] == 1){
				echo "<script type='text/javascript'>";
				echo "$(window).load(function(){
					$('#id04').modal('show');});";
				echo "</script>";
			}
			else if($_GET['phase'] == 2){
				echo "<script type='text/javascript'>";
				echo "$(window).load(function(){
					$('#id05').modal('show');});";
				echo "</script>";
			}
			if($_GET['logout'] == true){
				session_destroy();
			}
		?>

	</body>
</html>