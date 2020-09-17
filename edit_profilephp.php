<?php

include 'connection.php';
include 'session.php';

if(isset($_POST['save']))
{
  $_SESSION['fnameErr']=$_SESSION['lnameErr']=$_SESSION['phoneErr']=$_SESSION['genderErr']=$_SESSION['emailErr']="";
    $_SESSION['error']="";
    $var1=0;
    if(empty($_POST['fname'])) {
        $_SESSION['fnameErr']="Firstname can not be empty!";
        $var1=1;
    }
    if(empty($_POST['phone'])) {
        $_SESSION['phoneErr']="Phone no. can not be empty!";
        $var1=1;
    }
    if(empty($_POST['gender'])) {
        $_SESSION['genderErr']="Please select a gender";
        $var1=1;
    }
    if(empty($_POST['email'])) {
        $_SESSION['emailErr']="E-mail can not be empty!";
        $var1=1;
    }
    if($var1==1) {
   
        header("location:edit_profile.php");
    }

    else{

    $fname=mysqli_real_escape_string($conn, $_POST['fname']);
    $lname=mysqli_real_escape_string($conn, $_POST['lname']);
    $phone=mysqli_real_escape_string($conn, $_POST['phone']);
    $gender=mysqli_real_escape_string($conn,$_POST['gender']);
    $mail=mysqli_real_escape_string($conn, $_POST['email']);
    $bday=$_POST['birthday'];

    $var=0;
    if(!preg_match("/^[a-zA-Z ]*$/",$fname)) {
        $_SESSION['fnameErr']="Only letters and white space allowed!"; $var=1; }
    if(!preg_match("/^[a-zA-Z ]*$/",$lname)) {
        $_SESSION['lnameErr']="Only letters and white space allowed!"; $var=1; }
    if(!preg_match("/^[0-9 ]*$/",$phone)) {
        $_SESSION['phoneErr']="Only numerals allowed!"; $var=1; }
    if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",  $mail)) {
      $_SESSION['emailErr']="E-mail is not valid!"; $var=1; }

    if($var==1){

        header("location:edit_profile.php");
    }

    else{
    $sqr="UPDATE `user` SET `firstname`='$fname', `lastname`='$lname', `phone`='$phone', `birthday`='$bday', `gender`='$gender', `email`='$mail' WHERE `user_id`='$user_id'";
    $result= mysqli_query($conn, $sqr) or die(mysqli_error($conn));
    if($result) {
      $_SESSION['scs']= "Successfully saved :)";
      header("location:profile_page.php");
    }
    else {
      $_SESSION['err']= "Something is wrong, please try again later!";
      header("location:profile_page.php");
    }
}
}
}
?>