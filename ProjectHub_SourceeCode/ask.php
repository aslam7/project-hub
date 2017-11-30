<?php
	session_start();
	include 'session.php';
	if(!(isset($_SESSION['username']))){
		header("location:login.php");
	}
	else{
	?>
	<!DOCTYPE html>
<html>

<head>
	<title>ProjectHub</title>
	<link rel="stylesheet" type="text/css" href="upload_style.css">
	<link rel="stylesheet" type="text/css" href="home_style.css">
	<script type="text/javascript" src="home_js.js"></script>
	<script type="text/javascript">
	</script>
</head>

<!-- main view -->
<body style=";margin:0px;padding: 0px">
<div style="background:#39424e;">
<a href="home.php"><img src="./logo3.png" style="height:60px;width:200px;margin-left: 20px"></a>
<?php
	$count=1;
		echo '		
<a href="logout.php"><input type="button" name="signup" id="sign" value="Logout" onmouseover="changecolor(this);" onmouseleave="nocolor(this);"></a>
<a href="profile.php"><input type="button" name="login" id="log" value="Profile" onmouseover="changecolor(this);" onmouseleave="nocolor(this);"></a>

';
//	echo "<a href='ask.php'><lable id='log2'>Ask Question</lable></a>";
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
<form name="f1" action="asked.php" method="post">
<div style="margin-top: 100px"><center>
<h3 style="color:darkgreen">Enter your question</h3>
<input pattern=".{5,200}" required type="text" name="qest" placeholder="Type here......" style="margin-left:;border-width: 0px;background-color: transparent;border-bottom: 3px solid #2Ecf67;font-size: 20px;color:black;width: 1000px;text-align: center;margin-top: 10px">
<br>
<input type='submit' name='' style='border:1px solid #C2C7D0;height: 40px;width: 100px;margin:;background-color: #2Ecf67;color: white;border-radius: 10px;margin-top: 40px' value='Post'>
</center>
</div>
</form>
</body>
</html>