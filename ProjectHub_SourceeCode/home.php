<!DOCTYPE html>
<html>

<head>
	<title>ProjectHub</title>
	<link rel="stylesheet" type="text/css" href="home_style.css">
	<script type="text/javascript" src="home_js.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="w3.css">
	<style>
	.mySlides {display:none;}
	</style>
	</head>

<!-- main view -->
<body style="background-image: url('cool-background.jpgd');margin:0px;padding: 0px">
<div style="background:#39424e;">
<a href="home.php"><img src="./logo3.png" style="height:60px;width:250px;margin-left: 20px"></a>
<?php
	session_start();
	include 'session.php';
	if(!(isset($_SESSION['username']))){
echo '		
<a href="signup.php"><input type="button" name="signup" id="sign" value="SingUp" onmouseover="changecolor(this);" onmouseleave="nocolor(this);"></a>
<a href="login.php"><input type="button" name="login" id="log" value="Login" onmouseover="changecolor(this);" onmouseleave="nocolor(this);"></a>

';}
else
{

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
?>
</div>



<!-- main menu bar -->
<label class="left" style="letter-spacing: .2em">Top Projects</label>
<table id="menu" border="0" align="right">
	<tr>
		<!--<td id="t1" onmouseover="changecolor(this);" onmouseleave="nocolor(this);">Search</td><td  id="t1" onmouseover="changecolor(this);" onmouseleave="nocolor(this);"><a href="upload.html" onmouseover="changecolor(this)";  onmouseleave="nocolor(this);" id="linker">Upload</td><td  id="t1" onmouseover="changecolor(this);" onmouseleave="nocolor(this);">Q A</td><td  id="t1" onmouseover="changecolor(this);" onmouseleave="nocolor(this);">About Us</td>-->
		<td><a href="search.php" id="l1"><input type="button" id="t1" onmouseover="changecolor(this);" onmouseleave="nocolor(this);" name="search" value="Search"></a></td>
		<td><a href="upload2.php" id="l1"><input type="button" id="t1" onmouseover="changecolor(this);" onmouseleave="nocolor(this);" name="upload" value="Upload"></a></td>
		<td><a href="qa.php" id="l1"><input type="button" id="t1" onmouseover="changecolor(this);" onmouseleave="nocolor(this);" name="qa" value="Q and A"></a></td>
		<td><a href="aboutus.php" id="l1"><input type="button" id="t1" onmouseover="changecolor(this);" onmouseleave="nocolor(this);" name="aboutus" value="About us"></a></td>
	</tr>
</table>
<hr style="margin-top:45px;border:1px solid;">
<!-- TOP PROJECTS -->
<div style="height:200px;">
<div class="w3-content w3-section" style="max-width:500px;">
<?php
	include 'server.php';
	$ret= mysqli_query($con,"select * from project order by likes desc limit 4") or die("in n adsf ro d");
	
	while($ccl=mysqli_fetch_array($ret))
{	
	$pn = $ccl['pid'];
	$liker = mysqli_query($con,"select * from likes where pid='$pn'");
		$likerc=mysqli_num_rows($liker);
	?>
	<div class="mySlides" style="width:1300px;margin-left:-380px;">
	<div style="float:left;width:380px;height:240px;margin-top: -15px;">
		<center><label style="font-size: 24px"><b><?php echo $ccl['name'] ; ?></b></label></center>
		<hr style="">
		<label  style="color: darkgreen;margin-top: 20px"><b><u>Department</u></b></label><br>
		<label style="margin-left: 40px"><b><?php echo $ccl['branch'] ; ?></b></label><br>
		<label  style="color: darkgreen"><b><u>Field</u></b></label><br>
		<label style="margin-left: 40px"><b><?php echo $ccl['field'] ; ?></b></label>
		<hr>
		<img src="./like.png" style="height:30px;width:40px;margin-left: 20px">
		<label><?php echo $ccl['likes'];?></label>
		<?php
			$co=mysqli_query($con,"select * from ")
		?>
		<form action="project_viewer.php" method="post" style="float: right;">
		<input type="hidden" name="pid" value="<?php echo $ccl['pid']; ?>">
		<input type="submit" name="" style="border:1px solid #C2C7D0;height: 50px;width: 200px;color:;border-radius: 10px " value="View">
		</form>
	</div>
  <img src="<?php echo $ccl['file1'] ; ?>" style="float:left;width:300px;height:240px;margin-left:0px;border-radius:10px">
  <img  src="<?php echo $ccl['file2']; ?>" style="float: left;width:300px;height:240px;margin-left:0px;border-radius:10px">
  <img  src="<?php echo $ccl['file3']; ?>" style="float: left;width:300px;height:240px;margin-left:0px;border-radius:10px">
  </div>

<?php }
?>
</div>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>	
</div>
<hr style="margin-top:50px">

	
<!-- RECENT PROJECTS -->
<?php
	$ret= mysqli_query($con,"select * from project order by date desc limit 4") or die("in n adsf ro d");
	$p1=mysqli_fetch_array($ret);
	$p2=mysqli_fetch_array($ret);
	$p3=mysqli_fetch_array($ret);
	$p4=mysqli_fetch_array($ret);
?>
<div style="margin-top: -20px"></div>
<div>
<label style="letter-spacing: .2em;margin-left: 20px;">Recent Projects</label>
<hr style="margin-top:0px;border:1px solid;">
<div style="margin-top: -15px">
	<div style="margin-left: 10px;width: 625px;height: 100px;border:1px solid grey;border-radius: 10px;float:left;">
	<label style="color:darkgreen">Project Name:</label><label><b><?php echo "   ".$p1['name']?></b></label><br>
	<label style="font-size: 14px;color: green"><?php echo substr($p1['des'],0,100)?></label>
	<?php $pid1 = $p1['pid']?>...
	<center><form action='project_viewer.php' method='post'><input type='hidden' name='pid' value='<?php echo $pid1; ?>'>
			<input type='submit' name='' style='border:1px solid #C2C7D0;height: 30px;width: 100px;margin:;background-color: #2Ecf67;color: white;border-radius: 10px' value='View'></form></center>	
	</div>
	<div style="width: 625px;height: 100px;border:1px solid grey;border-radius: 10px;display: inline-block;margin-left: 30px">
		<label style="color:darkgreen">Project Name:</label><label><b><?php echo $p2['name']?></b></label><br>
	<label style="font-size: 14px;color: green"><?php echo substr($p2['des'],0,100)?></label>
	<?php $pid2 = $p2['pid']?>...
	<center><form action='project_viewer.php' method='post'><input type='hidden' name='pid' value='<?php echo $pid2; ?>'>
			<input type='submit' name='' style='border:1px solid #C2C7D0;height: 30px;width: 100px;margin:;background-color: #2Ecf67;color: white;border-radius: 10px' value='View'></form></center>
	</div>

	<div style="margin-left: 10px;width: 625px;height: 100px;border:1px solid grey;border-radius: 10px;float:left;">
		<label style="color:darkgreen">Project Name:</label><label><b><?php echo $p3['name']?></b></label><br>
	<label style="font-size: 14px;color: green"><?php echo substr($p3['des'],0,100)?></label>
	<?php $pid3 = $p3['pid']?>...
	<center><form action='project_viewer.php' method='post'><input type='hidden' name='pid' value='<?php echo $pid1; ?>'>
			<input type='submit' name='' style='border:1px solid #C2C7D0;height: 30px;width: 100px;margin:;background-color: #2Ecf67;color: white;border-radius: 10px' value='View'></form></center>
	</div>
	<div style="width: 625px;height: 100px;border:1px solid grey;border-radius: 10px;display: inline-block;margin-left: 30px">
		<label style="color:darkgreen">Project Name:</label><label><b><?php echo $p4['name']?></b></label><br>
	<label style="font-size: 14px;color: green"><?php echo substr($p4['des'],0,100); ?></label>
	<?php $pid4 = $p4['pid']?>...
	<center><form action='project_viewer.php' method='post'><input type='hidden' name='pid' value='<?php echo $pid4; ?>'>
			<input type='submit' name='' style='border:1px solid #C2C7D0;height: 30px;width: 100px;margin:;background-color: #2Ecf67;color: white;border-radius: 10px' value='View'></form></center>
	</div>

</div>
<!--<table style="height:200px;width: 1300px;" border="1">
	<tr>
		<td></td><td></td>
	</tr>
	<tr>
		<td></td><td></td>
	</tr>
</table>
-->
</div>
</body>
</html>