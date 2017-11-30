<?php

 if(isset($_POST['signme']))
{ 	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role = $_POST['role'];


	$con=mysqli_connect("localhost","root","","project") or die ("No Connection");

	if($role=="s")
		$tb="student";
	else
		$tb="faculty";

	$query2 = "select * from ".$tb." where username='$username'";
	$result2 = mysqli_query($con,$query2) or die("what is this");

	$num=0;
	$num = mysqli_num_rows($result2);
	if($num==0)
	{	

	$query = "insert into ".$tb." values(' ','$fname','$lname','$email','$username','$password',' ',' ',' ',' ')";

	$result=mysqli_query($con,$query) or die ("can not execute");

		session_start();
		$_SESSION['username'] = $username;
		header("location:home.php");
	}	
}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign up...</title>
	<style type="text/css">
		#one{
			width: px;
			font-weight: bold;
			padding: 5px;
		}
		tr{
		
		}
		table{
			/*border-collapse: separate;
			border-spacing: 0 40px;
			top:-10px;*/
			line-height: 45px;
		}
		#two{
			padding-left : 50px;
		}
	</style>
</head>
<body style="margin:0px;padding: 0px">
<div style="background:#39424e;">
<a href="home.php"><img src="./logo3.png" style="height:60px;width:200px;margin-left: 20px"></a></div>
<div style="caption-side: bottom;height: 500px;width: 500px;margin-left: 400px;margin-top: 40px;border-radius: 39px;border:7px solid #2Ecf67;background-color: ">
<!--<div style="height: 60px;width: 500px;background-color:palegreen;border-radius: 100px;padding-top: 4px">-->
<div style="margin-top: 20px"><label style="font-weight: bolder;margin-left:180px;margin-top: 20px;font-size: 24px;color: darkgreen">ProjectHub</label>
<hr style="border:5px solid #2Ecf67"></div>
<div style="margin-top: 30px">
<form action="signup.php" method="post" name="form1">
<table >
	<tr>
		<td id="one"><lable style="color: darkgreen">First Name*:</lable></td><td ><input id="two" type="text" name="fname" placeholder="Enter your firstname" pattern=".{7,100}" required style="margin-left: 0px;border-width: 0px;background-color: transparent;border-bottom: 3px solid grey;font-size: 20px;color:black;width: 300px" value="<?php if(isset($_POST['signme'])) echo $_POST['fname']; ?>"></td>
	</tr>
	<tr>
		<td id="one"><lable style="color: darkgreen">Last Name*:</lable></td><td><input id="two" type="text" name="lname" placeholder="Enter your lastname" pattern=".{7,100}" required style="margin-left: 0px;border-width: 0px;background-color: transparent;border-bottom: 3px solid grey;font-size: 20px;color:black;width: 300px" value="<?php if(isset($_POST['signme'])) echo $_POST['lname']; ?>"></td>
	</tr>
	<tr>
		<td id="one"><lable style="color: darkgreen">Email id*:</lable></td><td><input id="two" type="email" name="email" placeholder="Enter your email" required style="margin-left: 0px;border-width: 0px;background-color: transparent;border-bottom: 3px solid grey;font-size: 20px;color:black;width: 300px" value="<?php if(isset($_POST['signme'])) echo $_POST['email']; ?>"></td>
	</tr>
	<tr>
		<td id="one"><lable style="color: darkgreen">Username*:</lable></td><td><input id="two" type="text" name="username" placeholder="<?php if(isset($_POST['signme'])) echo 'Username already exist'; else 'Enter your username';?>" pattern=".{7,100}" required style="margin-left: 0px;border-width: 0px;background-color: transparent;border-bottom: 3px solid grey;font-size: 20px;color:black;width: 300px"></td>
	</tr>
	<tr>
		<td id="one"><lable style="color: darkgreen">Password*:</lable></td><td><input id="two" type="password" name="password" placeholder="Enter your password" minLength="5" pattern=".{7,100}" required style="margin-left: 0px;border-width: 0px;background-color: transparent;border-bottom: 3px solid grey;font-size: 20px;color:black;width: 300px"></td>
	</tr>
	<tr>
		<td id="one"><lable style="color: darkgreen">I AM A*:</lable></td><td><input id="two" type="radio" value="s" name="role" checked ="checked" style="margin-left: 0px;background-color: transparent;margin-left: 30px;"><label style="font-size: 20px;color:black;opacity: 0.7">Student</label><input id="two" type="radio" name="role" value="f" style="margin-left: 0px;background-color: transparent;margin-left: 50px"><label style="font-size: 20px;color:black;opacity: 0.7">Faculty</label></td>
	</tr>
</table>
<center><input type="submit" name="signme" value="Sign up!" style="margin-top: 0px;background-color: #2Ecf67;height: 50px;width: 200px;border-radius: 10px;border:0px;color: white"></center>
</form>
</div>
</body>
</html>
