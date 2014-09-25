<?php

	$server = "localhost";
	$user = "ShoppingCart";
	$pass = "wangchen1241";
	$db = "shoppingcart";

	//connect to mysql
	$conn = mysqli_connect($server, $user, $pass) or die("Sorry, cannot nonnect to the mysql.");

	//select the db
	mysqli_select_db($conn,$db) or die("Sorry, cannot select the database.");
?>