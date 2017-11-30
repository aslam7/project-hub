<!DOCTYPE html>
<html>
<head>
	<title>forgot...</title>
</head>
<body style="margin:0px;padding: 0px">
<?php
	
	if(isset($_POST['foo']))
	{
		echo "adsfads";
		//mail("aslam.iiitb407@gmail.com","ProjectHub",$msg,"From: aslam.iiitb407@gmail.com");
	/*	header("location:home.php");
		$email = $_POST['email'];
		include 'server.php';
		$s=0;
		$f=0;
		$username=$_SESSION['username'];
		$query="select * from  student where email='$email'";
		$result=mysqli_query($con,$query) or die ("can not execute");
		if(mysqli_num_rows($result)>0)
		{
			$row=mysqli_fetch_array($result);
		}
		else
		{
			$query="select * from  faculty where ema='$email'";
			$result=mysqli_query($con,$query) or die ("can not execute");
			$row=mysqli_fetch_array($result);		
		}
		$msg = "username: ".$row['username']." and Password: ".$row['Password'];
		mail($email."ProjectHub",$msg,"From: aslam.iiitb407@gmail.com");
		*/
	}	
?>

<div style="background:#39424e;">
<img src="./logo3.png" style="height:60px;width:200px;margin-left: 20px">
</div>
<div style="caption-side: bottom;height: 300px;width: 500px;margin-left: 400px;margin-top: 60px;border-radius: 100px;border:6px solid #2Ecf67;background-color: ">
<!--<div style="height: 60px;width: 500px;background-color:palegreen;border-radius: 100px;padding-top: 4px">-->
<div style="margin-top: 20px"><label style="font-weight: bolder;margin-left:180px;margin-top: 20px;font-size: 24px;color:darkgreen">ProjectHub</label>
<hr style="border:2px solid #2Ecf67"></div>
<div style="margin-top: 30px"><form>
<h3 style="color:darkgreen">Password will be sent your registered email id:</h3>
<h3 style="color:darkgreen">Email:</h3>

<center><input type="email" name="email" placeholder="Enter email id:" style="border-width: 0px;background-color: transparent;border-bottom: 3px solid grey;font-size: 20px;color:black;width: 400px"></center>
<center><input type="submit" name="foo" value="Send" style="margin-top: 30px;background-color: palegreen;height: 50px;width: 200px;border-radius: 100px;border:0px;color: blue"></center>
</form>
</div>
</div>
</body>
</html>