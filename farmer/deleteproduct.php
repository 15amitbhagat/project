<?php
	session_start();
	include 'database.php';

	$fid = $_GET['fid'];

	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location:loginfarmer.php');
	}

	$query = mysqli_query($conn,"DELETE from addfarmer where fid='$fid'");

    header('location:viewproductfarmer.php');

    ?>