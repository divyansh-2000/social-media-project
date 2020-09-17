<?php
    session_start();
    $_SESSION['error']="";
	$conn=mysqli_connect('localhost','root','','social_media');
if(!$conn){
	die("Connection failed:".mysqli_connect_error());
}
if(isset($_POST['reg_user']))
{
    $_SESSION['fnameErr']=$_SESSION['lnameErr']=$_SESSION['usernameErr']=$_SESSION['phoneErr']=$_SESSION['genderErr']=$_SESSION['mailErr']=$_SESSION['passErr']=$_SESSION['cpassErr']="";
    $_SESSION['error']="";
    $var1=0;
    if(empty($_POST['fname'])) {
        $_SESSION['fnameErr']="Firstname can not be empty!";
        $var1=1;
    }
    if(empty($_POST['username'])) {
        $_SESSION['usernameErr']="Username can not be empty!";
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
    if(empty($_POST['mail'])) {
        $_SESSION['mailErr']="E-mail can not be empty!";
        $var1=1;
    }
    if(empty($_POST['pass'])) {
        $_SESSION['passErr']="Password can not be empty!";
        $var1=1;
    }
    if(empty($_POST['cpass'])) {
        $_SESSION['cpassErr']="Please re-enter your password";
        $var1=1;
    }
    if($var1==1) {
        header("location:loginpage.php");
    }

    else{

    $fname=mysqli_real_escape_string($conn, $_POST['fname']);
    $lname=mysqli_real_escape_string($conn, $_POST['lname']);
    $username=mysqli_real_escape_string($conn, $_POST['username']);
    $phone=mysqli_real_escape_string($conn, $_POST['phone']);
    $gender=mysqli_real_escape_string($conn,$_POST['gender']);
    $mail=mysqli_real_escape_string($conn, $_POST['mail']);
    $pass=mysqli_real_escape_string($conn, $_POST['pass']);
    $cpass=mysqli_real_escape_string($conn, $_POST['cpass']);

    $var=0;
    if(!preg_match("/^[a-zA-Z ]*$/",$fname)){
        $_SESSION['fnameErr']="Only letters and white space allowed!"; $var=1;}
    if(!preg_match("/^[a-zA-Z ]*$/",$lname)){
        $_SESSION['lnameErr']="Only letters and white space allowed!"; $var=1;}
    if(!preg_match("/^[0-9 ]*$/",$phone)){
        $_SESSION['phoneErr']="Only numerals allowed!"; $var=1;}
    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,50}$/', $pass)) {
    	$_SESSION['passErr']="Password must contain 1 digit, 1 letter with minimum 8 characters!"; $var=1;}
    if(!preg_match('/^[0-9A-Za-z!@#$%]*$/', $username)) {
    	$_SESSION['usernameErr']="Username should only contain digits, letters and special characters(!@#$%)!"; $var=1;}
    if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",  $mail)) {
    	$_SESSION['mailErr']="E-mail is not valid!"; $var=1;}

    if($var==1){
        header("location:loginpage.php");
    }

    else{

    $squ="SELECT * FROM `user` WHERE username='$username'";
    $res=mysqli_query($conn, $squ);
    if(mysqli_num_rows($res)) {
    	$_SESSION['error']= "Username already exists!";
    	header("location:loginpage.php");
    }

    else{

    if($pass!=$cpass)
    {
        $_SESSION['passErr']= "Password did not match!";
    	header("location:loginpage.php");
    }

    else{

    $pass1=sha1($pass);
    $default_image="avtar.png";
    $sqr="INSERT INTO `user` (`firstname`,`lastname`,`username`,`phone`,`gender`,`email`,`password`,`profile_picture`) VALUES('$fname', '$lname', '$username', '$phone', '$gender', '$mail', '$pass1','$default_image')";
    $result= mysqli_query($conn, $sqr) or die(mysqli_error($conn));
    if($result) {
    	$_SESSION['error']= "Successfully Registered :)";
    	header("location:loginpage.php");
    }
    else {
    	$_SESSION['error']= "Something is wrong, please try again later!";
    	header("location:loginpage.php");
    }
}
}
}
}

}

if(isset($_POST['log_user']))
{
    $_SESSION['error']=$_SESSION['username1Err']=$_SESSION['pass1Err']="";
    $var1=0;
    if(empty($_POST['pass1'])) {
        $var1=1;
    }
    if(empty($_POST['username1'])) {
        $var1=1;
    }
    if($var1==1) {
        $_SESSION['error']="Please enter both the fields!";
        header("location:loginpage.php");
    }
    else {
        $username1=mysqli_real_escape_string($conn, $_POST['username1']);
        $pass=mysqli_real_escape_string($conn, $_POST['pass1']);
        $var2=0;
        if(!preg_match('/^[0-9A-Za-z!@#$%]*$/', $username1)) {
             $var2=1;
        }
        if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,50}$/', $pass)) {
         $var2=1;
        }

        if($var2==1)
        {
            $_SESSION['error']="Please enter correct Username and Password!";
            header("location:loginpage.php");
        }
        else {

        $pass1=sha1($pass);

        $sqch= "SELECT * FROM `user` WHERE username='$username1'";
        $res1=mysqli_query($conn, $sqch);
        if(mysqli_num_rows($res1)>0)
        {
            $sqq= "SELECT * FROM `user` WHERE username='$username1'";
            $res2 = mysqli_query($conn, $sqq);
            $row = mysqli_fetch_assoc($res2);
            if($row['password']==$pass1) {
            $_SESSION['id']=$row['user_id'];
            $_SESSION['success']="You have logged in Successfully :)";
            header("location:home.php");
            }
            else {
                $_SESSION['error']="Password is incorrect!";
                header("location:loginpage.php");
            }
        }

        else {
            $_SESSION['error']="Username does not exist!";
            header("location:loginpage.php");
        }
    }
    }
}
?>