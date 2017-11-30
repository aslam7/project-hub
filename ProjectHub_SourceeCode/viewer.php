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
}	
echo "</div>";
$qid = $_POST['qest'];
	$res = mysqli_query($con,"select * from question where qid='$qid'") or die("selecting");
	$values = mysqli_fetch_array($res) or die("fetching");
	$qname= $values['qname'];
	$username=$values['username'];
	$time = $values['date'];
	?>
	<div style="margin-left: 300px;margin-top: 30px;">
	<table style="border: 4px solid #2Ecf67;width:700px;border-radius: 10px"><tr>
	<?php
		echo "<td><lable style='color:darkgreen;font-size:20px;'>".$username."</lable>";
		echo "<lable style='color:black;font-size:10px;margin-left:10px'>".$time."</lable><br>";
		echo "<center><lable style='color:black;text-align:center;font-size:20px;margin-left:20px'><u>".$qname."</u></lable></center><br></td></tr></table>";
		echo "<center><lable style='color:darkgreen;font-size:24px;margin-left:-400px'>Answers::</lable>";
		$re = mysqli_query($con,"select * from answer where qid='$qid'") or die("selecting");
		$c=0;
		$c = mysqli_num_rows($re);
		echo "<lable style='color:darkgreen;font-size:24px;'>".$c."</lable></center>";
	?>
		<div style="margin-left:0px">
		<?php
			if($c>0)
			{
				while($values = mysqli_fetch_array($re)){
				$username = $values['username'];
				$answer = $values['answer'];
				$time = $values['date']; 
				echo "<table style='border: 4px solid #2Ecf67;width:700px;border-radius:10px'><tr><td><lable style='color:darkgreen;font-size:20px;'>".$username."</lable>";
				echo "<lable style='color:black;font-size:10px;margin-left:10px'>".$time."</lable><br>";
				echo "<lable style='color:#39424e;font-size:20px;margin-left:20px'>".$answer."</lable></td></tr></table><br>";
				}
			}
			else
				echo "<center><h3 style='margin-left:-400px;color:black'>Not yet answered!!</h3></center>";	
		?>
			<form action="answered.php" method="post">
				<input type="hidden" name="qid" value="<?php echo $qid; ?>" >
				<textarea autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" rows="8" cols="40" name="answer" required style="background: transparent;color:black;border: 2px solid #2Ecf67;font-size: 20px"></textarea>
				<input type='submit' name='' style='border:1px solid #C2C7D0;height: 40px;width: 150px;margin:;background-color: #2Ecf67;color: white;border-radius: 10px' value='Post Answer!'>
			</form>			
		</div>
	</div>
	<?php		
?>