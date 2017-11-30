<?php

$file = $_FILES['myfile']['tmp_name'];
$target_file = "upload/".basename($_FILES['myfile']['name']);

if( move_uploaded_file($file, $target_file))
	echo "Success";
else
	echo "Fail";
echo $_FILES['myfile']['size'];
?>