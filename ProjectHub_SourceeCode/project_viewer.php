
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
	<script type="text/javascript" src="home_js.js"></script>
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

	$pid = $_POST['pid'];
	if(isset($_POST['thisone']))
	{
		$comm= $_POST['comm'];
		$query = "insert into comments(pid,username,comment) values('$pid','$username','$comm')";
		$result = mysqli_query($con,$query) or die('what aisdf dsf');

	}	
	$rn = mysqli_query($con,"select * from project where pid='$pid'") or die("query") ;
	$pro= mysqli_fetch_array($rn) or die("fetching");
?>
</div>
<div style="margin-top: 10px">
<?php

	if(isset($_POST['likeme']))
	{
		$query = "insert into likes(pid,username) values('$pid','$username')";	
	mysqli_query($con,$query) or die("kya yaha pe");
	$query = "update project set likes=likes+1 where pid='$pid'";
$result=mysqli_query($con,$query) or die ("can not execute");
	}
$liker = mysqli_query($con,"select * from likes where pid='$pid' and username='$username'");
		$likerc=mysqli_num_rows($liker);
		$liko = mysqli_query($con,"select * from likes where pid='$pid'");
		$likoc=mysqli_num_rows($liko);
?>
<div style="float: left">

<img src="./like.png" height="40" width="40" style="margin-left: 90px"><label><?php echo $likoc; ?></label>
	<div style="width: 900px;display: inline-block;">
	<center>
	<label style="color:black;font-size: 24px;font-weight:bold;margin-left:0px"><?php echo $pro['name']; ?></label>
	</center>
	</div>
	</div>
	
	<?php
		
		if($likerc==0)
		{?>
		<div style="display: inline-block;margin-left: 50px">
			<form action="project_viewer.php" method="post">
					
					<input type="hidden" name="pid" value="<?php echo $pid; ?>">
					<input type='submit' name='likeme' style='border:1px solid #C2C7D0;height: 40px;width: 100px;margin:;background-color: #2Ecf67;color: white;border-radius: 10px' value='Like!'></form></center>
			</form>
			</div>
		<?php }
		else{
			?>
			<div style="display: inline-block;margin-left: 50px;pointer-events: none">
			<form action="project_viewer.php" method="post">
					
					<input type="hidden" name="pid" value="<?php echo $pid; ?>">
					<input type='submit' name='likeme' style='border:1px solid #C2C7D0;height: 40px;width: 100px;margin:;color: black;border-radius: 10px' value='Liked!'></form></center>
			</form>
			</div>
		<?php	
		}	
	?>
	
	<hr style="width: 1200px;border:2px solid #2Ecf67;margin-top: -10px">
</div>
<div style="float: left;margin-left: 50px;margin-top: 50px">
		<label  style="color: darkgreen;margin-top: 20px"><b><u>Department</u></b></label><br>
		<label style="margin-left: 40px"><b><?php echo $pro['branch'] ; ?></b></label><br><br>
		<label  style="color: darkgreen"><b><u>Field</u></b></label><br>
		<label style="margin-left: 40px"><b><?php echo $pro['field'] ; ?></b></label><br><br><br>
		<label  style="color: darkgreen"><b><u>Uploaded on</u></b></label><br>
		<label style="margin-left: 40px"><b><?php echo $pro['date'] ; ?></b></label><br><br><br>
		<?php
			$oo = mysqli_query($con,"select * from members where pid='$pid limit 1'");
			$dl = mysqli_fetch_array($oo);
			$ul=$dl['username'];
			$oo2 = mysqli_query($con,"select * from student where username='$ul'");
			$dl2 = mysqli_fetch_array($oo2);
		?>
		<label  style="color: darkgreen"><b><u>Uploaded By</u></b></label><br>
		<label style="margin-left: 40px"><b><?php echo $dl2['fname']." ".$dl2['lname']; ?></b></label>
</div>
<div style="margin-left: 400px">
	 <video width="700" height="340" controls>
  <source src="<?php echo $pro['vfile']; ?>" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
  Your browser does not support the video tag.
</video>
</div>
<hr style="width: 1200px;border:1px solid gold">
</div>
<div style="margin-top: 10px">
	<img src="<?php echo $pro['file1']; ?>" height="250px" width="350px" style="margin-left:50px">
	<img src="<?php echo $pro['file2']; ?>" height="250px" width="350px" style="margin-left:50px">
	<img src="<?php echo $pro['file3']; ?>" height="250px" width="350px" style="margin-left:50px">
	<center><hr style="width: 1200px;border:1px solid gold"></center>
</div>
<div style="border:4px solid #349395;border-radius: 10px;margin-top: 10px;width: 1200px;margin-left: 50px;padding-bottom:10px">
	<lable style='color:darkgreen;font-size:18px;font-weight:bolder'>Project Name: </lable><lable style='color:black;font-size:18px;font-weight:bolder'><?php echo $pro['name']; ?></lable><br><br><lable style='margin-left:30px;color:black;font-size: 18px'><?php echo $pro['des']; ?></lable>
</div>
<center><hr style="width: 1200px;border:1px solid gold"></center>
<div style="margin-top: 10px">
	<center><label style="color:darkgreen;font-size: 24px;font-weight:">Contributor(s)</label><hr style="width: 1200px;border:2px solid #2Ecf67"></center>
</div>
<div style="float: left;width: 1250px">
<?php
	$cows=mysqli_query($con,"select * from members where pid='$pid'");
	while ($ben=mysqli_fetch_array($cows)) {
			$uner=$ben['username'];
			$iron=mysqli_query($con,"select * from student where username='$uner'");
			$iam = mysqli_fetch_array($iron);
		?>
			<div style="float:left;border:2px solid #2Ecf67;height: 400px;width: 300px;margin-left: 40px;margin-top: 10px">
				<center>
					<img src="<?php echo '.$iam["ph"]';?>" height="100px" width="100px"><br>
					<label style="color:black;font-size: 24px;font-weight:"><?php echo $iam['fname']." ".$iam['lname'] ?></label>
				</center>
				<center><hr style="width: 250px;border:1px solid gold"></center><div style="margin-top: 20px">
				<label style="color: darkgreen;font-size:16px;font-weight: bold;">ID.NO:</label><br>
				<label style="color:black;font-size: 16px;margin-left: 30px;"><?php echo $iam['idno']; ?></label>
				</div>
				<div style="margin-top: 20px">
				<label style="color: darkgreen;font-size:16px;font-weight: bold;">Email:</label><br>
				<label style="color:black;font-size: 16px;margin-left: 30px;"><?php echo $iam['email']; ?></label>
				</div>
				<div style="margin-top: 20px">
				<label style="color: darkgreen;font-size:16px;font-weight: bold;">Department:</label><br>
				<label style="color:black;font-size: 16px;margin-left: 30px;"><?php echo $iam['branch']; ?></label>
				</div>
			</div>
		<?php
	}
?>
</div>
<br>
<div style="float:right;">
	<center><hr style="width: 1200px;border:1px solid gold;margin-right: 40px"></center><div style="margin-top: 20px">
</div>
<div>
<label style="color:darkgreen;font-size: 24px;font-weight:">Comments!</label><hr style="width: 1200px;border:2px solid #2Ecf67;margin-right: 50px">
<?php

$pid = $_POST['pid'];
	$res = mysqli_query($con,"select * from comments where pid='$pid'") or die("selecting");
	$nm= mysqli_num_rows($res);
	if($nm>0)
	{	
		while($values = mysqli_fetch_array($res))
		{
			$uname = $values['username'];
				$ucomment = $values['comment'];
				$udate = $values['date']; 
				echo "<table style='border: 2px solid #2Ecf67;width:700px'><tr><td><lable style='color:darkgreen;font-size:20px;'>".$uname."</lable>";
				echo "<lable style='color:black;font-size:10px;margin-left:10px'>".$udate."</lable><br>";
				echo "<lable style='color:black;font-size:20px;margin-left:20px'>".$ucomment."</lable></td></tr></table><br>";
				}
			}
			else
				echo "<center><h3 style='margin-left:-400px;color:black'>No Comments!!</h3></center>";	
		?>
			<form action="project_viewer.php" method="post">
				<input type="hidden" name="pid" value="<?php echo $pid; ?>" >
				<textarea autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" rows="8" cols="40" name="comm" required style="background: transparent;color:black;border: 2px solid #2Ecf67;font-size: 20px"></textarea>
				<input type='submit' name='thisone' style='border:1px solid #C2C7D0;height: 40px;width: 200px;margin:;background-color: #2Ecf67;color: white;border-radius: 10px' value='Add your comment!'>
			</form>			
		</div>
	</div>
<div>	
	<?php		
?>
