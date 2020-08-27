<?php
require 'config/config.php';

if(isset($_SESSION['username'])) {
	$userLoggedIn = $_SESSION['username'];
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);
}
else {
	header("Location: register.php");
}

?>

<html>
<head>
     <title>Enroute</title>

     <!---Javascript---->

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
     <script src="Assets/js/bootstrap.js"></script>
     
     <!---CSS--->

     <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="Assets/css/bootstrap.css">
     <link rel="stylesheet" type="text/css" href="Assets/css/style.css">

</head>
<body>
	<div class="top_bar">
		<div class="logo">
			<a href="index.php">Enroute</a>
			
		</div>

		<nav>
			<a href="<?php echo $userLoggedIn; ?>">
				<?php echo $user['first_name']; ?>
			</a>
			<a href="#">
				<i class="fa fa-home fa-lg"></i>
			</a>
			<a href="#">
				<i class="fa fa-envelope fa-lg"></i>
			</a>
			<a href="#">
				<i class="fa fa-bell fa-lg"></i>
			</a>
			<a href="#">
				<i class="fa fa-users fa-lg"></i>
			</a>
			<a href="#">
				<i class="fa fa-cog fa-lg"></i>
			</a>
			<a href="includes/handlers/logout.php">
				<i class="fa fa-sign-out fa-lg"></i>
			</a>
		</nav>
		
	</div>


	<div class="wrapper">

