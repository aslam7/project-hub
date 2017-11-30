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
		<div style="float:left;border: 0px solid #2Ecf67;height: 570px;width: 400px;border-right-width: 1px;border-bottom-width: 1px">
			<center><img src="<?php echo $row['ph']; ?>" style="border-radius: 10px" height="100px" width="100px"><br>
		<?php
			echo "<h3 style='color:black'>".$row['fname']." ".$row['lname']."</h3></center>";
			if($s==1)
			{
				$nop= mysqli_query($con,"select * from members where username='$username'");
				$n1=mysqli_num_rows($nop);
				$nnn= mysqli_query($con,"select * from question where username='$username'");
				$n2=mysqli_num_rows($nnn);
				$mmm= mysqli_query($con,"select * from answer where username='$username'");
				$n3=mysqli_num_rows($mmm);
				?>
				<table style="color:black;margin-top: 20px" id="thore">
				<tr><td><label id="pr">ID Number:</label></td><td><?php echo $row['idno']; ?></td></tr>
				<tr><td><label id="pr">Email:</label></td></td><td><?php echo $row['email']; ?></td></tr>
				<tr><td><label id="pr">Branch:</label></td></td><td><?php echo $row['branch']; ?></td></tr>
				</table>
				<table style="color:black;margin-top: 20px" id="thore">
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
		?>			
		</div>
		<div style="float: left">
		<label style="color:darkgreen;font-size: 23px;font-weight: bold;margin-left:10px;">My Projects</label>
		<hr style="color:gold;width: 500px;margin-left: 10px">
		<div>
		<?php
			$me = mysqli_query($con,"select * from members where username='$username'");
			$cet = mysqli_num_rows($me);
			if($cet>0){
			while($row = mysqli_fetch_array($me)){
				$pid = $row['pid'];
				$you = mysqli_query($con,"select * from project where pid='$pid'");
				$reco = mysqli_fetch_array($you);
			echo "<center><table style='border: 4px solid #2Ecf67;border-radius:10px;width:700px;margin-top:'><tr><td>";
			echo "<lable style='color:darkgreen;font-size:18px;font-weight:bolder'>Project Name: </lable><lable style='color:black;font-size:18px;font-weight:bolder'>".$reco['name']."</lable><br><br><lable style='margin-left:30px;color:#39424e'>".$reco['des']."<br><a href=".$reco['sfile'].">Download Files</a></lable>";
			$pid=$row['pid'];
			echo "<center><form action='project_viewer.php' method='post'><input type='hidden' name='pid' value='$pid'>
			<input type='submit' name='' style='border:1px solid #C2C7D0;height: 40px;width: 100px;margin:;background-color: #2Ecf67;color: white;border-radius: 10px' value='View'></form></center>";
			echo "</td></tr></table></center><br>";			
		}
	}
		?>		
		</div>
		<label style="color:darkgreen;font-size: 23px;font-weight: bold;margin-left:10px;">My Questions</label>
		<hr style="color:black;width: 500px;margin-left: 10px">
		<div style="margin-left:40px">
		<?php
			$result = mysqli_query($con,"select * from question where username='$username'");
			$count=0;
			$count= mysqli_num_rows($result);
			if($count>0)
			{
				while($row=mysqli_fetch_array($result))
				{
					echo "<center><table style='border: 4px solid #2Ecf67;border-radius:10px;width:700px;margin-top:;'><tr><td>";
			echo "<center><lable style='color:black;font-size:20px'>".$row['qname']."</lable>";
			$qest=$row['qid'];
			echo "<form action='viewer.php' method='post'><input type='hidden' name='qest' value='$qest'><input type='submit' name='' style='border:1px solid #C2C7D0;height: 40px;width: 100px;margin:;background-color: #2Ecf67;color: white;border-radius: 10px' value='View'></form></center>";
			echo "</td></tr></table></center><br>";	
				}	
			}
			else
				echo "No questions were asked by you!";	
		?>
		</div>
		
		<label style="color:darkgreen;font-size: 23px;font-weight: bold;margin-left:10px;">My Answers</label>
		<hr style="color:black;width: 500px;margin-left: 10px">
		<div style="margin-left:40px">
		<?php
			$result = mysqli_query($con,"select * from answer where username='$username'");
			$count=0;
			$count= mysqli_num_rows($result);
			if($count>0)
			{
				while($row=mysqli_fetch_array($result))
				{
					$qid=$row['qid'];

					$rot=mysqli_query($con,"select * from question where qid='$qid'");
					$rotvalue = mysqli_fetch_array($rot);
					$qname = $rotvalue['qname'];
					$quser = $rotvalue['username'];
					$qtime = $rotvalue['date'];
			echo "<table style='border: 4px solid #2Ecf67;border-radius:10px;width:700px'><tr><td><lable style='color:darkgreen;font-size:20px;'>".$quser."</lable>";
				echo "<lable style='color:black;font-size:10px;margin-left:10px'>".$qtime."</lable><br>
				<center><lable style='color:black;font-size:20px;'><u>".$qname."</u></lable></center></td></tr></table>";
				echo "<table style='border: 4px solid #2Ecf67;width:700px; margin-top:-10px'><tr><td><lable style='color:darkgreen;font-size:20px;'>Your Answer:</lable>";
				echo "<lable style='color:black;font-size:10px;margin-left:10px'>".$row['date']."</lable><br>
				<lable style='color:#39424e;font-size:20px;margin-left:20px'>".$row['answer']."</lable></td></tr></table><br><br>";
				}	
			}
			else
				echo "No answeres by you!";	
		?>
		</div>
		</div>
	</div>
<?php
}
?>
