<?php

include 'connection.php';
include 'session.php';

if($_POST['delsubmit'])
{
	$postid=$_POST['postid'];
	$del=mysqli_query($conn, "DELETE FROM `post` WHERE `post_id`='$postid'");
	$_SESSION['deleted']="Post deleted successfully";
	header("location:home.php");
}
if($_POST['delsubmit1'])
{
	$postid=$_POST['postid'];
	$del=mysqli_query($conn, "DELETE FROM `post` WHERE `post_id`='$postid'");
	$_SESSION['deleted']="Post deleted successfully";
	header("location:myphotos.php");
}

?>