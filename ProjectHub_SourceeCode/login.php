<!DOCTYPE html>
<html>
<head>
	<title>Login...</title>
</head>
<body style="margin:0px;padding: 0px">
<div style="background:#39424e;">
<a href="home.php"><img src="./logo3.png" style="height:60px;width:200px;margin-left: 20px"></a>
</div>
<div style="caption-side: bottom;height: 380px;width: 500px;margin-left: 400px;margin-top: 60px;border-radius: 39px;border:7px solid #2Ecf67;background-color: ">
<!--<div style="height: 60px;width: 500px;background-color:palegreen;border-radius: 100px;padding-top: 4px">-->
<div style="margin-top: 20px"><label style="font-weight: bolder;margin-left:180px;margin-top: 20px;font-size: 24px;color: darkgreen">Login here...</label>
<hr style="border:5px solid #2Ecf67"></div>
<?php
if( isset($_POST['submit']) ) {

$username=$_POST['username'];
$password=$_POST['password'];
if($username!='' && $password!='' && $username!=' ' && $password!=' ')
{
$s=0;
$f=0;

$con=mysqli_connect("localhost","root","","project") or die ("No Connection");

$query="select * from  student where username='$username' and password='$password'";
$result=mysqli_query($con,$query) or die ("can not execute");
//$row=mysqli_fetch_array($result);
if(mysqli_num_rows($result))
	$s=1;
$query="select * from  faculty where username='$username' and password='$password'";
$result=mysqli_query($con,$query) or die ("can not execute");
//$row=mysqli_fetch_array($result);
//if($row['username']==$username && $username!=NULL)
if(mysqli_num_rows($result))
	$f=1;
if($s==1 || $f==1)
{	
	session_start();
	$_SESSION['username'] = $username;
	header("location:home.php");
}	
else
	echo "<h2 style='font-size:14px;text-align:center';text-decoration:blink>Incorrect username or password</h2>";
}
else
    echo "<h2 style='font-size:14px;text-align:center';text-decoration:blink>Incorrect username or password</h2>";
}
?>
<div style="margin-top: 10px"><form action="login.php" method="post">
<h3 style="color: darkgreen">Username*:</h3>
<input type="text" name="username" placeholder="Enter your username" style="margin-left: 140px;border-width: 0px;background-color: transparent;border-bottom: 3px solid grey;font-size: 20px;color:black;width: 300px">
<h3 style="color:darkgreen ">Password*:</h3>
<input type="password" name="password" placeholder="Enter your password" style="margin-left: 140px;border-width: 0px;background-color: transparent;border-bottom: 3px solid grey;font-size: 20px;color:black;width: 300px">
<a href="forgot.php" style="color:darkgreen">Forgot Password</a>
<center><input type="submit" name="submit" value="Login!" style="margin-top: 30px;background-color: #2Ecf67;height: 50px;width: 200px;border-radius: 10px;border:0px;color: white"></center>
</form>
</div>
</div>
</body>
</html>
