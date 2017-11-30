<?php
$username = "Guest";
if( !empty($_SESSION) ) {
	$username = $_SESSION['username'];
}
?>
