<?php
	
	$pname = $_POST['pname'];
	$dept = $_POST['dept'];
	$field = $_POST['field'];
	$des = $_POST['des'];
	include 'server.php';
	$query = "insert into project(name,branch,field,des) values('$pname','$dept','$field','$des')";
	//mysqli_query($con,$query) or die("asdfjadf asdflasdf asdflasdf asdf");
	header("location:upload2.php");
?>