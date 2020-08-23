<?php
require 'config/config.php';

if(isset($_SESSION['username'])) {
	$userLoggedIn = $_SESSION['username'];
}
else {
	header("Location : register.php");
}

?>

<html>
<head>
     <title>Enroute</title>

     <!---Javascript---->

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
     <script src="Assets/js/bootstrap.js"></script>
     
     <!---CSS--->

     <link rel="stylesheet" type="text/css" href="Assets/css/bootstrap.css">
     <link rel="stylesheet" type="text/css" href="Assets/css/style.css">

</head>
<body>
	<div class="top_bar">
		<div class="logo">
			<a href="index.php">Enroute</a>
			
		</div>
		
	</div>

