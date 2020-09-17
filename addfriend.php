<?php

include 'connection.php';
include 'session.php';

if($_POST['accept'])
{
	$un=$_POST['au'];
	$resu=mysqli_query($conn, "SELECT * FROM `friends` WHERE `un`='$username' AND `fun`='$un'");
	if(!mysqli_num_rows($resu))
	{
        $s=mysqli_query($conn, "INSERT INTO `friends`(`un`, `fun`) VALUES ('$username', '$un')");
        $s=mysqli_query($conn, "INSERT INTO `friends`(`fun`, `un`) VALUES ('$username', '$un')");
        $_SESSION['d']="Friend request accepted";
        $resu=mysqli_query($conn, "DELETE FROM `friend_requests` WHERE `run`='$username' AND `un`='$un'");
        header("location:request_list.php");
    }
    else {
    	$_SESSION['f']="Already friends";
    	header("location:searchlist.php");
    }
}
else
{
	header("location:searchlist.php");
}
?>