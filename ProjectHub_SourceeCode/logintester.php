<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="logintester.php">
	<input type="text" name="username">
	<input type="password" name="password">
	<input type="submit" name="submit" value="click">
</form>
</body>
</html>
<?php
if( isset($_POST['submit']) ) {

$username=$_POST['username'];
$password=$_POST['password'];

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

echo "f is ".$f."and s is ".$s;
//if($f==1 || $s==1)
//	header("location:home.php");
//else
//	echo "nothing";
}
?>	