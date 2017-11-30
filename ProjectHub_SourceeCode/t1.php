<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php
if(isset($_POST['dd']))
{	
$file = $_FILES['ph']['tmp_name'];
$see =  "upload/".basename($_FILES['ph']['tmp_name']);
echo $see."   ========><br>";
	$target_file = "upload/".basename($_FILES['ph']['name']);
	move_uploaded_file($file, $see) or die("not upload");
	echo $file,"  ===>  ".$target_file;
	//mysqli_query($con,"update ".$tb." set ph='$target_file' where username='$username'") or //die("asd asd ");
	echo '<img src="$target_file">';
}	
?>
<form action="t1.php" method="post" enctype="multipart/form-data">
	<input type="file" name="ph">
	<input type="submit" name="dd" value="ok">
</form>
</body>
</html>