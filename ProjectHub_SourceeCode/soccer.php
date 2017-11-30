<html>

<head>
	<title>ProjectHub</title>
	<link rel="stylesheet" type="text/css" href="upload_style.css">
	<link rel="stylesheet" type="text/css" href="home_style.css">
	<script type="text/javascript" src="upload_js.js"></script>
	<script type="text/javascript" src="home_js.js"></script>
</head>

<!-- main view -->
<body style="margin:0px;padding: 0px">
<div style="background:#39424e;">
<a href="home.php"><img src="./logo3.png" style="height:60px;width:200px;margin-left: 20px"></a>
<?php
	$count=1;
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
	$ok=1;
?>
</div>
<div style="caption-side: bottom;height: 500px;width:;margin-left:;margin-top: 10px;border-radius: 39px;border:7px solid #349395;background-color: ">
<!--<div style="height: 60px;width: 500px;background-color:palegreen;border-radius: 100px;padding-top: 4px">-->
<div style="margin-top: 10px"><center><label style="font-weight: bolder;margin-left:;margin-top: 20px;font-size: 24px;color: darkgreen;">ProjectHub</label>
<hr style="border:5px solid #349395"></center></div>
<div>
<table border="0" id="table1">
	<tr>
		<td id="tyre1"><center><lable style="font-weight;font-weight: bold;margin-left:;margin-top:;font-size: 24px;color: darkgreen;">Project Details</lable></center></td>
		<td id="tyre1"><center><lable style="font-weight: bolder;margin-left:;margin-top: 20px;font-size: 24px;color: darkgreen;">Project Files</lable></center></td>
		<td id="tyre1"><center><lable style="font-weight: bolder;margin-left:;margin-top: 20px;font-size: 24px;color: darkgreen;">Contibuters(s)</lable></center></td>
	</tr>
	<tr>
		<td id="tyre2" style="vertical-align: top;text-align: left;opacity: 0.0;pointer-events:none;">
			<table border="0">
			<tr>
				<td id="tdtd"><lable style="color: darkgreen;font-weight: bold;">Project Name*:</lable></td><td id="tdtd" style="padding-left: 10px"><input type="text" name="pname" placeholder="Enter Project Name" value="<?php if(isset($_POST['rm']))echo $_POST['pname']; ?>" style="margin-left: 0px;border-width: 0px;background-color: transparent;border-bottom: 3px solid grey;font-size: 15px;color: black;"></td>
			</tr>
			<tr>
				<td id="tdtd"><lable style="color: darkgreen;font-weight: bold;">Department*:</lable></td><td id="tdtd" style="padding-left: 10px"><input type="text" name="dept" placeholder="Enter Department Name" value="<?php if(isset($_POST['rm']))echo $_POST['dept']; ?>"  style="margin-left: 0px;border-width: 0px;background-color: transparent;border-bottom: 3px solid grey;font-size: 15px;color: black;"></td>
			</tr>
			<tr>
				<td id="tdtd"><lable style="color: darkgreen;font-weight: bold;">Field/Area*:</lable></td><td id="tdtd" style="padding-left: 10px"><input type="text" name="field" placeholder="Enter field/area" value="<?php if(isset($_POST['rm']))echo $_POST['field']; ?>"  style="margin-left: 0px;border-width: 0px;background-color: transparent;border-bottom: 3px solid grey;font-size: 15px;color: black;"></td>
			</tr>
			<tr>
				<td id="tdtd" colspan="2"><lable style="color: darkgreen;font-weight: bold;">Description*:</lable><br><textarea autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" rows="12" cols="60" name="des" value="<?php if(isset($_POST['rm'])) ; ?>"  style="background: transparent;color: black;border-color: solid grey;"><?php if(isset($_POST['rm'])) echo $_POST['des']; ?></textarea></td>
			</tr>
			</table>
		</td>
		<td id="tyre2" style="vertical-align: top;text-align: left;opacity: 0.0;pointer-events:none;">
		<lable style="color: darkgreen;font-weight: bold;font-size: 14px">Note*: For Demonstration you can upload maximum 3 image files and 1 video file</lable>
		<hr>
		<div>
		<lable style="color: darkgreen;font-weight: bold;"><u>Image files:</u></lable>
		<lable style="color: darkgreen;font-weight: bold;margin-left: 20px">Maxsize 10 MB each</lable>
		<input type="file" name="file1" value="" required>
		<input type="file" name="file2" value="" >
		<input type="file" name="file3" value="" >
		<input type="hidden" name="pname" value="<?php echo $pname;?>">
		</div>
		<div style="margin-top:20px">
		<lable style="color: darkgreen;font-weight: bold;margin-left:;"><u>Video file:</u></lable>
		<lable style="color: darkgreen;font-weight: bold;margin-left: 20px;">Maxsize 300 MB</lable>
		<input type="file" name="vfile">
		</div>
		<div style="margin-top:20px">
		<lable style="color: darkgreen;font-weight: bold;"><u>Source file:</u></lable>
		<lable style="color: darkgreen;font-weight: bold;margin-left: 20px;">Maxsize 300 MB</lable>
		<input type="file" name="sfile">
		</div>
		</td>
		<td id="tyre2" style="vertical-align: top;text-align: left;">
		<center><lable style="color: darkgreen;font-weight: bold;"><u>Maximum 7 Contibutors:</u></lable></center>
		<?php
			$ro = mysqli_query($con,"select * from project where name='$pname'")or die("query");
			$rw = mysqli_fetch_array($ro) or die("fetchi");
			$pid= $rw['pid'];
			mysqli_query($con,"insert into members(pid,username) values('$pid','$username')");
		?>
		<form action="upload3.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="pid" value="<?php echo $pid ?>">
		<input type="text" name="user" required><input type="submit" name="rm" value="Add memeber!">
		</form>
		<?php 
			echo "<center><h4 style='color:darkgreen'>1.".$row['fname']." ".$row['lname']."</h4></center>"
		?>
		</td>
	</tr>
</table>
<form action="home.php" method="post">
			<center><input type="submit" name="rm" style="border:1px solid #C2C7D0;height: 50px;width: 100px;background-color: #2Ecf67;color:black;border-radius: 10px;color: black" value="Done"></center>
		</form></
</form>	
</div>
</div>