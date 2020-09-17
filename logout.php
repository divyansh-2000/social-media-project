<?php

session_start();
unset($_SESSION['id']);
session_destroy();
$_SESSION['error']="Logged out!";
header("location:loginpage.php");

?>