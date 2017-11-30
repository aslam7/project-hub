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
	<link rel="stylesheet" type="text/css" href="home_style.css">
	<link rel="stylesheet" type="text/css" href="profile_style.css">
	<script type="text/javascript" src="home_js.js"></script>
	<style type="text/css">
		#one{
			padding-bottom: 30px;
		}
	</style>
</head>

<!-- main view -->
<body style=";margin:0px;padding: 0px">
<div style="background:#39424e;">
<a href="home.php"><img src="./logo3.png" style="height:60px;width:200px;margin-left: 20px"></a>
<?php
	echo '<a href="logout.php"><input type="button" name="signup" id="sign" value="Logout" onmouseover="changecolor(this);" onmouseleave="nocolor(this);"></a>';
	//echo "<a href='profile.php'><lable id='log'>Profile</lable></a>";
	include 'server.php';
	$s=0;
	$f=0;
	$username=$_SESSION['username'];
	$query="select * from  student where username='$username'";
	$result=mysqli_query($con,$query) or die ("can not execute");
	if(mysqli_num_rows($result)>0)
	{
		$row=mysqli_fetch_array($result);
		$s=1;
	}
	else
	{
		$query="select * from  faculty where username='$username'";
		$result=mysqli_query($con,$query) or die ("can not execute");
		$row=mysqli_fetch_array($result);		
		$f=1;
	}
	echo "<lable id='namer'>Hi! ".$row['fname']."</lable>";
?>
	</div>
	<div style="">
		<div style="float:left;border: 0px solid #2Ecf67;height: 570px;width: 400px;border-right-width: 8px;border-bottom-width: 8px">
			<center><img src="<?php echo $row['ph']; ?>" height="100px" width="100px"><br>
		<?php
			echo "<h3 style='color:#39424e'>".$row['fname']." ".$row['lname']."</h3></center>";
			if($s==1)
			{
				$nop= mysqli_query($con,"select * from members where username='$username'");
				$n1=mysqli_num_rows($nop);
				$nnn= mysqli_query($con,"select * from question where username='$username'");
				$n2=mysqli_num_rows($nnn);
				$mmm= mysqli_query($con,"select * from answer where username='$username'");
				$n3=mysqli_num_rows($mmm);
				?>
				<table style="color:#39424e;margin-top: 20px" id="thore">
				<tr><td><label id="pr">ID Number:</label></td><td><?php echo $row['idno']; ?></td></tr>
				<tr><td><label id="pr">Email:</label></td></td><td><?php echo $row['email']; ?></td></tr>
				<tr><td><label id="pr">Branch:</label></td></td><td><?php echo $row['branch']; ?></td></tr>
				</table>
				<table style="color:#39424e;margin-top: 20px" id="thore">
				<tr><td><label id="pr">Projects:</label></td><td><?php echo $n1; ?></td></tr>
				<tr><td><label id="pr">Questioned:</label></td></td><td><?php echo $n2; ?></td></tr>
				<tr><td><label id="pr">Answersed:</label></td></td><td><?php echo $n3; ?></td></tr>
				</table><br><br>
				<div>
					<form action="editprofile.php" method="post">
						<input type="submit" name="" style="border:1px solid #C2C7D0;height: 30px;width: 150px;margin:;background-color: #2Ecf67;color: white;border-radius: 10px" value="Edit Profile">
					</form><br><br>
					<form action="changepassword.php" method="post">
						<input type="submit" name="" style="border:1px solid #C2C7D0;height: 30px;width: 150px;margin:;background-color: #2Ecf67;color: white;border-radius: 10px" value="Change Password">
					</form>
				</div>
		<?php	}

			$query="select * from  student where username='$username'";
	$result=mysqli_query($con,$query) or die ("can not execute");
	if(mysqli_num_rows($result)>0)
	{
		$row=mysqli_fetch_array($result);
		$s=1;
	}
	else
	{
		$query="select * from  faculty where username='$username'";
		$result=mysqli_query($con,$query) or die ("can not execute");
		$row=mysqli_fetch_array($result);		
		$f=1;
	}		
		?>			
		</div>
		<div style="float: left">
		<label style="color:darkgreen;font-size: 23px;font-weight: bold;margin-left:10px;">Edit your profile</label>
		<hr style="color:#2Ecf67;width: 500px;margin-left: 10px">
<div style="margin-top: 30px;margin-left: 150px">
<form action="edited.php" method="post" name="form1" enctype="multipart/form-data">
<table >
	<tr>
		<td id="one"><lable style="color:darkgreen">Change profilepic:</lable></td><td id="one"><input id="two" type="file" name="ph"></td>
	</tr>
	<tr>
		<td id="one"><lable style="color:darkgreen">First Name*:</lable></td><td id="one"><input id="two" type="text" name="fname" placeholder="Enter your firstname" style="margin-left: 0px;border-width: 0px;background-color: transparent;border-bottom: 2px solid #2Ecf67;font-size: 20px;color:#39424e;width: 300px" value="<?php echo $row['fname']; ?>" pattern=".{3,100}"></td>
	</tr>
	<tr>
		<td id="one"><lable style="color:darkgreen">Last Name*:</lable></td><td id="one"><input id="two" type="text" name="lname" placeholder="Enter your lastname" style="margin-left: 0px;border-width: 0px;background-color: transparent;border-bottom: 2px solid #2Ecf67;font-size: 20px;color:#39424e;width: 300px" value="<?php echo $row['lname']; ?>" pattern=".{3,100}"></td>
	</tr>
	<tr>
		<td id="one"><lable style="color:darkgreen">Email id*:</lable></td><td id="one"><input id="two" type="email" name="email" placeholder="Enter your email" style="margin-left: 0px;border-width: 0px;background-color: transparent;border-bottom: 2px solid #2Ecf67;font-size: 20px;color:#39424e;width: 300px" value="<?php echo $row['email']; ?>"></td>
	</tr>
	<tr>
		<td id="one"><lable style="color:darkgreen">Department*:</lable></td><td id="one"><input id="two" type="text" name="branch" placeholder="Enter Department" style="margin-left: 0px;border-width: 0px;background-color: transparent;border-bottom: 2px solid #2Ecf67;font-size: 20px;color:#39424e;width: 300px" value="<?php echo $row['branch']; ?>" pattern=".{3,100}"></td>
	</tr>
	<tr>
		<td id="one"><lable style="color:darkgreen">ID*:</lable></td><td id="one"><input id="two" type="text" name="idno" placeholder="Enter id" style="margin-left: 0px;border-width: 0px;background-color: transparent;border-bottom: 2px solid #2Ecf67;font-size: 20px;color:#39424e;width: 300px" value="<?php echo $row['idno']; ?>" pattern=".{3,100}"></td>
	</tr>
</table>
<center>
<input type="hidden" name="role" value="<?php echo $s; ?>">
<input type='submit' name='' style='border:1px solid #C2C7D0;height: 40px;width: 150px;margin:;background-color: #2Ecf67;color: white;border-radius: 10px' value='Save Changes'></center>
</form>
</div>
		</div>
	</div>
<?php
}
?>
