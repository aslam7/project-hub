<?php
	session_start();
	include 'server.php';
	include 'session.php';
	$qest = $_POST['qest'];
	$query = "insert into question(qname,username) values('$qest','$username')";
	$result = mysqli_query($con,$query) or die('what aisdf dsf');
	header("location:qa.php");
?>	