<!DOCTYPE html>
<html>

<head>
	<title>ProjectHub</title>
	<link rel="stylesheet" type="text/css" href="home_style.css">
	<script type="text/javascript" src="home_js.js"></script>
</head>

<!-- main view -->
<body style="background-image: url('cool-background.jpg');margin:0px;padding: 0px">
<div style="background:#349395;">
<a href="home.php"><img src="./logo3.png" style="height:60px;width:200px;margin-left: 20px"></a>
<?php
	session_start();
	include 'session.php';
	if(!(isset($_SESSION['username']))){
echo '		
<a href="signup.html"><input type="button" name="signup" id="sign" value="SingUp" onmouseover="changecolor(this);" onmouseleave="nocolor(this);"></a>
<a href="login.php"><input type="button" name="login" id="log" value="Login" onmouseover="changecolor(this);" onmouseleave="nocolor(this);"></a>

';}
else
{

	echo "<a href='logout.php'><lable id='log'>Logout</lable></a>";
	echo "<a href='profile.php'><lable id='log'>Profile</lable></a>";
	include 'server.php';
	$s=0;
	$f=0;
	$username=$_SESSION['username'];
	$query="select * from  student where username='$username'";
	$result=mysqli_query($con,$query) or die ("can not execute");
	if(mysqli_num_rows($result)>0)
	{
		$row=mysqli_fetch_array($result);
	}
	else
	{
		$query="select * from  faculty where username='$username'";
		$result=mysqli_query($con,$query) or die ("can not execute");
		$row=mysqli_fetch_array($result);		
	}
	echo "<lable id='namer'>Hi! ".$row['fname']."</lable>";
}
?>
</div>

