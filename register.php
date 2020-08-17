<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "social");
if(mysqli_connect_errno()){
	echo "Failed to connect: " . mysqli_connect_errno();
}
//Declaring variables to prevent errors
$fname="";//first name
$lname="";//Last name
$em="";//Email
$em2="";//Email 2
$password="";
$password2="";
$date="";//Sign up date
$error_array=array();//hold error messages

if(isset($_POST['register_button'])){
	//Registration Form values

	//First Name
	$fname=strip_tags($_POST['reg_fname']);//Remove html tags
	$fname=str_replace(' ', '', $fname);//remove specs
	$fname=ucfirst(strtolower($fname));//Uppercase first letter
	$_SESSION['reg_fname']=$fname;//Stores first name to session

	//Last Name
	$lname=strip_tags($_POST['reg_lname']);//Remove html tags
	$lname=str_replace(' ', '', $lname);//remove specs
	$lname=ucfirst(strtolower($lname));//Uppercase first letter
	$_SESSION['reg_lname']=$lname;//Stores last name to session

    //Email
	$em=strip_tags($_POST['reg_email1']);//Remove html tags
	$em=str_replace(' ', '', $em);//remove specs
	$em=ucfirst(strtolower($em));//Uppercase first letter
	$_SESSION['reg_email1']=$em;//Stores email to session

	//email2
	$em2=strip_tags($_POST['reg_email2']);//Remove html tags
	$fname=str_replace(' ', '', $em2);//remove specs
	$fname=ucfirst(strtolower($em2));//Uppercase first letter
	$_SESSION['reg_email2']=$em2;//Stores email to session

	//password
	$password=strip_tags($_POST['reg_password']);//Remove html tags
	$password=strip_tags($_POST['reg_password2']);//Remove html tags
	
	$date = date("Y-m-d");//Gets the current date

	if($em==$em2){
		//Check if emails is in valid format
		if(filter_var($em, FILTER_VALIDATE_EMAIL)){
		$em=filter_var($em, FILTER_VALIDATE_EMAIL);

		//Check if email already exists
		$e_check=mysqli_query($con, "SELECT email From users WHERE email='$em'");

		//Count the number of rows returned
		$num_rows=mysqli_num_rows($e_check);

		if($num_rows>0){
			array_push($error_array, "Email already in use<br>") ;
		}


		}
		else{
			rray_push($error_array, "Invalid format<br>");
		}

	}
	else{
		rray_push($error_array, "Emails don't match<br>");
	}

	if(strlen($fname)>25 || strlen($fname)<2){
		rray_push($error_array, "Your first name must be between 2 and 25 characters<br>");
	}

	if(strlen($lname)>25 || strlen($lname)<2){
		rray_push($error_array, "Your last name must be between 2 and 25 characters<br>");

	if($password!=$password2){
		rray_push($error_array, "Your passwords do not match<br>");
	}
	else {
		if(preg_match('/[^A-Za-z0-9]/', $password)){
			rray_push($error_array, "Your passwordcan only contains characters or numbers<br>");
		}
	}

	if(strlen($password>30 || strlen($password)<5)){
		rray_push($error_array, "Your password must be between 5 and 30 characters");
	}




}
?>



<html>
<head>
	<title>Welcome to SwirlFeed!</title>
</head>
<body>

	<form action="register.php" method="POST">
		<input type="text" name="reg_fname" placeholder="First Name" value="<?php if (isset($_SESSION['reg_fname'])) {
			echo $_SESSION['reg_fname'];
		}
		?>" required>
		<br>

		<?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "Your first name must be between 2 and 25 characters<br>";?>

		<input type="text" name="reg_lname" placeholder="Last Name" value="<?php if (isset($_SESSION['reg_lname'])) {
			echo $_SESSION['reg_lname'];
		}
		?>" required>
		<br>
		<?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "Your last name must be between 2 and 25 characters<br>";?>

		<input type="email" name="reg_email1" placeholder="Email" value="<?php if (isset($_SESSION['reg_email1'])) {
			echo $_SESSION['reg_email1'];
		}
		?>" required>
		<br>
		<input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php if (isset($_SESSION['reg_email2'])) {
			echo $_SESSION['reg_email2'];
		}
		?>" required>
		<br>
		<?php if(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>";?>

		<input type="password" name="reg_password" placeholder="Password" required>
		<br>
		<?php if(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>";?>

		<input type="Password" name="reg_password2" placeholder="Confirm Password" required>
		<br>
		<input type="submit" name="reg_button" value="Register">



	</form>

</body>
</html>
