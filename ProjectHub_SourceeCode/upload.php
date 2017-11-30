<?php
	session_start();
	include 'session.php';
	if(!(isset($_SESSION['username']))){
		header("location:login.php");
	}
	else{
?>
<html>

<head>
	<title>ProjectHub</title>
	<link rel="stylesheet" type="text/css" href="upload_style.css">
	<link rel="stylesheet" type="text/css" href="home_style.css">
	<script type="text/javascript" src="upload_js.js"></script>
</head>

<!-- main view -->
<body style="background-image: url('cool-background.jpg');margin:0px;padding: 0px">
<div style="background:#349395;">
<a href="home.php"><img src="./logo3.png" style="height:60px;width:200px;margin-left: 20px"></a>
<?php
	$count=1;
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
	$step1=0;
	$step2=0;
	$step3=0;
	$oker=1;
?>
</div>
<div style="caption-side: bottom;height: 500px;width:;margin-left:;margin-top: 10px;border-radius: 39px;border:7px solid #349395;background-color: ">
<!--<div style="height: 60px;width: 500px;background-color:palegreen;border-radius: 100px;padding-top: 4px">-->
<div style="margin-top: 10px"><center><label style="font-weight: bolder;margin-left:;margin-top: 20px;font-size: 24px;color: lightgreen;">ProjectHub</label>
<hr style="border:5px solid #349395"></center></div>
<div>
<table border="0" id="table1">
<form action="<?php if($oker==1 && isset($_FILES['file1'])) echo 'comer.php'; else echo 'upload.php'; ?>" method="post" enctype="multipart/form-data">
	<tr>
		<td id="tyre1"><center><lable style="font-weight;font-weight: bold;margin-left:;margin-top:;font-size: 24px;color: lightgreen;">Project Details</lable></center></td>
		<td id="tyre1"><center><lable style="font-weight: bolder;margin-left:;margin-top: 20px;font-size: 24px;color: lightgreen;">Project Files</lable></center></td>
		<td id="tyre1"><center><lable style="font-weight: bolder;margin-left:;margin-top: 20px;font-size: 24px;color: lightgreen;">Contibuters(s)</lable></center></td>
	</tr>
	<tr>
		<td id="tyre2" style="<?php if(isset($_POST['rm'])){ echo 'opacity: 0.4;pointer-events: none'; $step1=1;}else{}?>">
			<table border="0">
			<tr>
				<td id="tdtd"><lable style="color: lightgreen;font-weight: bold;">Project Name*:</lable></td><td id="tdtd" style="padding-left: 10px"><input pattern=".{5,200}" required type="text" name="pname" placeholder="Enter Project Name" value="<?php if(isset($_POST['rm']))echo $_POST['pname']; ?>" required style="margin-left: 0px;border-width: 0px;background-color: transparent;border-bottom: 3px solid grey;font-size: 15px;color: white;"></td>
			</tr>
			<tr>
				<td id="tdtd"><lable style="color: lightgreen;font-weight: bold;">Department*:</lable></td><td id="tdtd" style="padding-left: 10px"><input pattern=".{5,200}" required type="text" name="dept" placeholder="Enter Department Name" value="<?php if(isset($_POST['rm']))echo $_POST['dept']; ?>" required style="margin-left: 0px;border-width: 0px;background-color: transparent;border-bottom: 3px solid grey;font-size: 15px;color: white;"></td>
			</tr>
			<tr>
				<td id="tdtd"><lable style="color: lightgreen;font-weight: bold;">Field/Area*:</lable></td><td id="tdtd" style="padding-left: 10px"><input type="text"  pattern=".{5,200}" required name="field" placeholder="Enter field/area" value="<?php if(isset($_POST['rm']))echo $_POST['field']; ?>"  required style="margin-left: 0px;border-width: 0px;background-color: transparent;border-bottom: 3px solid grey;font-size: 15px;color: white;"></td>
			</tr>
			<tr>
				<td id="tdtd" colspan="2"><lable style="color: lightgreen;font-weight: bold;">Description*:</lable><br><textarea autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" rows="12" cols="60" name="des" value="<?php if(isset($_POST['rm'])) ; ?>" required style="background: transparent;color:white;border-color: solid grey;"><?php if(isset($_POST['rm'])) echo $_POST['des']; ?></textarea></td>
			</tr>
			</table>
		</td>
		<td id="tyre2" style="vertical-align: top;text-align: left;<?php if($step1==0) echo 'opacity: 0.4;pointer-events:none';?>">
		<lable style="color: lightgreen;font-weight: bold;font-size: 14px">Note*: For Demonstration you can upload maximum 3 image files and 1 video file</lable>
		<hr>
		<div>
		<lable style="color: lightgreen;font-weight: bold;"><u>Image files:</u></lable>
		<lable style="color: lightgreen;font-weight: bold;margin-left: 20px">Maxsize 10 MB each</lable>
		<input type="file" name="file1" id="file1" value="">
		<?php
		if (isset($_FILES["file1"])) {
			if ($_FILES["file1"]["size"] > 102400) {
					$ok=0;
			}
		}			
		?>
		<input type="file" name="file2">
		<?php
		if (isset($_FILES["file2"])) {
			if ($_FILES["file2"]["size"] > 102400) {
					$ok=0;
			}
		}			
		?>
		<input type="file" name="file3">
		<?php
		if (isset($_FILES["file3"])) {
			if ($_FILES["file3"]["size"] > 102400) {
					$ok=0;
			}
		}			
		?>
		</div>
		<div style="margin-top:20px">
		<lable style="color: lightgreen;font-weight: bold;margin-left:;"><u>Video file:</u></lable>
		<lable style="color: lightgreen;font-weight: bold;margin-left: 20px;">Maxsize 300 MB</lable>
		<input type="file" name="vfile">
		</div>
		<div style="margin-top:20px">
		<lable style="color: lightgreen;font-weight: bold;"><u>Source file:</u></lable>
		<lable style="color: lightgreen;font-weight: bold;margin-left: 20px;">Maxsize 300 MB</lable>
		<input type="file" name="sfile">
		</div>
		</td>
		<td id="tyre2" style="vertical-align: top;text-align: left;<?php echo 'opacity: 0.4;pointer-events:none';?>">
		<center><lable style="color: lightgreen;font-weight: bold;"><u>Maximum 7 Contibutors:</u></lable></center>
		<input type="text" name="user"><input type="submit" name="rm" value="ok!">
		</td>
	</tr>
</table>
<center><input type="submit" name="rm" value="ok!"></center>
</form>	
</div>
</div>
</body>
</html>	
<!-- update usercount set usercount=0; -->
