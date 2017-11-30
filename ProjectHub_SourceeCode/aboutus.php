<!DOCTYPE html>
<html>

<head>
	<title>ProjectHub</title>
	<link rel="stylesheet" type="text/css" href="home_style.css">
	<script type="text/javascript" src="home_js.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="w3.css">
	<style>
	.mySlides {display:none;}
	</style>
	</head>

<!-- main view -->
<body style="background-image: url('cool-background.jpgd');margin:0px;padding: 0px">
<div style="background:#39424e;">
<a href="home.php"><img src="./logo3.png" style="height:60px;width:250px;margin-left: 20px"></a>
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

	echo '		
<a href="logout.php"><input type="button" name="signup" id="sign" value="Logout" onmouseover="changecolor(this);" onmouseleave="nocolor(this);"></a>
<a href="profile.php"><input type="button" name="login" id="log" value="Profile" onmouseover="changecolor(this);" onmouseleave="nocolor(this);"></a>

';
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
<div>
<style type="text/css">
	h4{
		color:darkgreen;
	}
</style>
<div style="border: 1px solid #2Ecf67; height: 350px; width: 240px;margin-top: 40px;margin-left: 40px;float: left;border-radius: 10px">
<center><div><img src="" style="height: 100px;width: 100px"></div>
<h4><u>Aslam Shaik</u></h4>
<div style="margin-top: 20px">
<h5>B121407</h5>
<h5>aslam.iiitb407@gmail.com</h5>
<h5>Computer Science Engineering</h5>	
</div>
</center>
</div>
<div style="border: 1px solid #2Ecf67; height: 350px; width: 240px;margin-top: 40px;margin-left: 8px;display: inline-block;border-radius: 10px">
<center><div><img src="" style="height: 100px;width: 100px"></div>
<h4><u>Harish Yadav</u></h4>
<div style="margin-top: 20px">
<h5>B121407</h5>
<h5>aslam.iiitb407@gmail.com</h5>
<h5>Computer Science Engineering</h5>	
</div></center>
</div>	
<div style="border: 1px solid #2Ecf67; height: 350px; width: 240px;margin-top: 40px;margin-left: 5px;display: inline-block;border-radius: 10px">
<center><div><img src="" style="height: 100px;width: 100px"></div>
<h4><u>Rakesh</u></h4>
<div style="margin-top: 20px">
<h5>B121407</h5>
<h5>aslam.iiitb407@gmail.com</h5>
<h5>Computer Science Engineering</h5>	
</div></center>
</div>
<div style="border: 1px solid #2Ecf67; height: 350px; width: 240px;margin-top: 40px;margin-left: 5px;display: inline-block;border-radius: 10px">
<center><div><img src="" style="height: 100px;width: 100px"></div>
<h4><u>Bhagvan</u></h4>
<div style="margin-top: 20px">
<h5>B121407</h5>
<h5>aslam.iiitb407@gmail.com</h5>
<h5>Computer Science Engineering</h5>	
</div></center>
</div>
<div style="border: 1px solid #2Ecf67; height: 350px; width: 240px;margin-top: 40px;margin-left: 5px;display: inline-block;border-radius: 10px">
<center><div><img src="" style="height: 100px;width: 100px"></div>
<h4><u>Rama Krishna</u></h4>
<div style="margin-top: 20px">
<h5>B121407</h5>
<h5>aslam.iiitb407@gmail.com</h5>
<h5>Computer Science Engineering</h5>	
</div></center>
</div>

</div>
</body>
</html>
