<?php

include 'connection.php';
include 'session.php';

if(isset($_POST['change_profile_photo']))
{
	$profile_photo=$_POST['edit_profile_photo'];
	$sq=mysqli_query($conn,"UPDATE `user` SET `profile_picture`='$profile_photo' WHERE `username`='$username'");
	$_SESSION['scs']='Profile picture updated';
	header("location:profile_page.php");
}

?>