<?php

include 'connection.php';
include 'session.php';

if($_POST['send'])
{
	$rn=$_POST['usern'];
	$result1=mysqli_query($conn, "SELECT * FROM `friend_requests` WHERE `un`='$username' AND `run`='$rn'");
	$re=mysqli_query($conn, "INSERT INTO `friend_requests`(`un`, `run`) VALUES ('$username','$rn')");
	$_SESSION['sent']="Friend request sent successfully";
	header("location:searchlist.php");
}

?>