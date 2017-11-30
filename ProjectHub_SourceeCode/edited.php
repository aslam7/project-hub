<?php
session_start();
	include 'session.php';
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$branch = $_POST['branch'];
$idno = $_POST['idno'];
$role = $_POST['role'];

$size = $_FILES['ph']['size'];
if($size>10000000)
		header("location:editprofile.php");

$con=mysqli_connect("localhost","root","","project") or die ("No Connection");

if($role=="1")
	$tb="student";
else
	$tb="faculty";

if($size!=0)
{	
$file = $_FILES['ph']['tmp_name'];
	$target_file = "upload/".basename($_FILES['ph']['tmp_name']);
	move_uploaded_file($file, $target_file) or die("not upload");
	mysqli_query($con,"update ".$tb." set ph='$target_file' where username='$username'") or die("asd asd ");
}
$query = "update ".$tb." set fname='$fname',lname='$lname',email='$email',branch='$branch',idno='$idno' where username='$username'";
$result=mysqli_query($con,$query) or die ("can not execute");
header("location:profile.php");
?>