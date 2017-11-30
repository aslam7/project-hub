<?php
session_start();
$start = 0;
unset($_SESSION);
session_unset();
session_destroy();
header("location:home.php");
?>