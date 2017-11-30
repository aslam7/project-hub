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
	//echo "<a href='logout.php'><lable id='log'>Logout</lable></a>";
	//echo "<a href='profile.php'><lable id='log'>Profile</lable></a>";
	//echo "<a href='ask.php'><lable id='log2'>Ask Question</lable></a>";
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
?>
</div>
<div>
	<form action="search.php" method="post">
		<center><input type="text" name="search" style="background-color: transparent;margin-top: 20px;height: 30px;width: 500px;color: black;font-size: 20px;border:1px solid #2Ecf67;font-size: large;"><input type='submit' name="bt" value='Search!' style='border:1px solid #C2C7D0; height:40px;width:100px;background-color: #2Ecf67;color:white'></center>
	</form>
	<br><br>
</div>
<div>
<?php	
if(1)
{
	$i=0;
	if(isset($_POST['bt']))
	{
	 $search = $_POST['search'];
	 $keywords = explode(" ",$search);

	$query = "select * from project WHERE ";
	foreach ($keywords as $word){
		$i++;
		if($i==1)
			$query.= "name like '%$word%' ";
		else
			$query.= "or name like '%$word%' ";
		}	
	}
	else
	{
		$query="select * from project";
	}	
	$con = mysqli_connect("localhost","root","","project") or die ("could not connect to the database!");

	$results=mysqli_query($con,$query);

	$count=mysqli_num_rows($results);

	if($count>0){
		while($row = mysqli_fetch_array($results)){
			echo "<center><table style='border: 4px solid #2Ecf67;border-radius:10px;width:700px;margin-top:'><tr><td>";
			echo "<lable style='color:darkgreen;font-size:18px;font-weight:bolder'>Project Name: </lable><lable style='color: black;font-size:18px;font-weight:bolder'>".$row['name']."</lable><br><br><lable style='margin-left:30px;color:#39424e'>".$row['des']."</lable>";
			$pid=$row['pid'];
			echo "<center><form action='project_viewer.php' method='post'><input type='hidden' name='pid' value='$pid'><input type='submit' value='View' style='border:1px solid #C2C7D0; height:50px;width:100px;background-color: #2Ecf67;color:white'></form></center>";
			echo "</td></tr></table></center><br>";			
		}
	}
	else{
		echo "<center><h3 style='color:white'>No results found!!</h3></center>";	
	}	
}
?>

</div>
</body>
</html>
</body>
</html>