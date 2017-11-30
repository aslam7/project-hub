<?php
session_start();
include 'session.php';
include 'server.php';

$qid = $_POST['qid'];
$answer = $_POST['answer'];
$query = "insert into answer(answer,qid,username) values('$answer','$qid','$username')";
	$result = mysqli_query($con,$query) or die('what aisdf dsf');
	header("location:qa.php");
?>	