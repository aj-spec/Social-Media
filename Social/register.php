<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';

?>



<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Enroute</title>
	<link rel="stylesheet" type="text/css" href="Assets/css/register_style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="Assets/js/register.js"></script>
</head>
<body>
	<?php
	if(isset($_POST['register_button'])) {
		echo '
		<script>
		$(document).ready(function() {
			$("#first").hide();
			$("#second").show();
			});

		</script>


		';
	}

	?>

	<div class="wrapper">

		<div class="login_box">
			<div class="login_header">
			<h1>Enroute!</h1>
			Login or sign up below!
			
		</div>
		<div id="first">
			<form action="register.php" method="POST">
		<input type="email" name="log_email" placeholder="Email Address" value="<?php if(isset($_SESSION['log_email'])) {
			echo $_SESSION['log_email'];}
			?>" required>
		<br>
		<input type="password" name="log_password" placeholder="Password">
		<br>
		<input type="submit" name="log_button" placeholder="Login">
		<br>
		<a href="#" id="signup" class="signup">Need an account? Register Here</a>

		<?php if(in_array("Email or password was incorrect<br>", $error_array)) echo "Email or password was incorrect<br>"; ?>
	</form>

			
		</div>

	<div id="second">
		<form action="register.php" method="POST">

		<input type="text" name="reg_fname" placeholder="First Name" value="<?php if(isset($_SESSION['reg_fname'])) {
			echo $_SESSION['reg_fname'];
		} ?>" required>
		<br>
		<?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "Your first name must be between 2 and 25 characters<br>";?>


		<input type="text" name="reg_lname" placeholder="Last Name" value="<?php if(isset($_SESSION['reg_lname'])) {
			echo $_SESSION['reg_lname'];
		} ?>" required>
		<br>
		<?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "Your last name must be between 2 and 25 characters<br>";?>


		<input type="email" name="reg_email" placeholder="Email" value="<?php if(isset($_SESSION['reg_email'])) {
			echo $_SESSION['reg_email'];
		} ?>" required>
		<br>


		<input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php if(isset($_SESSION['reg_email2'])) {
			echo $_SESSION['reg_email2'];
		} ?>" required>
		<br>
		<?php if(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>";
		else if(in_array("Invalid Format<br>", $error_array)) echo "Invalid Format<br>";
		else if(in_array("Emails don't match<br>", $error_array)) echo "Emails don't match<br>";?>


		<input type="password" name="reg_password" placeholder="Password" required>
		<br>


		<input type="password" name="reg_password2" placeholder="Confirm Password" required>
		<br>
		<?php if(in_array("Passwords do not match<br>", $error_array)) echo "Passwords do not match<br>";
		else if(in_array("Your password can only contain english characters<br>", $error_array)) echo "Your password can only contain english characters<br>";
		else if(in_array("Your password must be between 5 and 30<br>", $error_array)) echo "Your password must be between 5 and 30<br>";?>


		<input type="submit" name="register_button" id="register_button"value="Register">
		<br>

		<?php if(in_array("<span style='color: #14c800'> You're all set!</span><br>", $error_array)) echo "<span style='color: #14c800'> You're all set!</span><br>";?>
		<a href="#" id="signin" class="signin">Already have an account? Sign in Here!</a>

	</form>
	</div>
	
</div>
</div>

</body>
</html>