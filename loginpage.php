<?php
session_start();
$conn=mysqli_connect('localhost','root','','social_media');
if(!$conn){
	die("Connection failed:".mysqli_connect_error());
}
if(!isset($_SESSION['usernameErr']) || !isset($_SESSION['username1Err'])) {
$_SESSION['fnameErr']="";
$_SESSION['lnameErr']="";
$_SESSION['usernameErr']="";
$_SESSION['phoneErr']="";
$_SESSION['genderErr']="";
$_SESSION['mailErr']="";
$_SESSION['passErr']="";
$_SESSION['cpassErr']="";
}
if(isset($_SESSION['error'])) {
echo $_SESSION['error'];
unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login/Registration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style >
		.body{
			margin: 0;
			padding: 0;
			background-color: white;
			}
		.header
		{
			background-color:#534;
			width:100%; 
			height: 80px;
			border:1px solid #534;

		}
		.left
		{
			width: 55%;
			position: absolute;
			margin-left: 5vw;
		}
		.right
		{
			width: 45%;
			position: absolute;
			top:16%;
			left: 56%;
		}
			.registration_form
		{
			background-color:white;
			border: 1px solid rgb(189, 199, 216);
			border-radius:5px;
			font-family:Helvetica, Arial, sans-serif;
			font-size:18px;
			font-weight:500;
			outline-color:rgb(77, 144, 254);
			padding-bottom:8px;
			padding-top:8px;
			padding-left:10px;
			padding-right:10px;
			margin:6px;
		}
		#error
		{
			color: red;
			font-size: 70%;
		}
	</style>
</head>
<body bgcolor="lightgrey" background="bg2.png" style="background-size: cover;background-attachment: fixed;">
	<div class="header">
		<span style="float: left;color:white;margin-top: 25px;font-size: 3vw;margin-left: 30px;">
		<b>
			APNIBOOK
		</b>
		</span>
		<span style="margin-left:44vw;color:white;">Username</span>
		<span style="margin-left:6vw;color:white;">Password</span>
		<br>
		<form action="sign_up.php" method="POST">
		<input type="text" name="username1" placeholder="Username" style="right: 23vw; width: 11vw; border:2px solid white; margin-left:44vw;">
		<input type="password" name="pass1" placeholder="Password" style=";right: 6vw; width: 11vw; border: 2px solid white;">
		<input style="background-color: #534;color:white;border: 2px solid white;" type="submit" value="Login" name="log_user">
	    </form>
	</div>
	<div class="right">
		<br><br><span style="color:#0E385F;font-size: 20px;margin:2%;position: relative;">JOIN, CONNECT and SHARE :)</span><br>
		<span style="color: #0E385F;">It helps to connect with friends and share memories with them.</span>
	</div>
	<div class="left">
		
			<br><br><span style="font-size: 3vw;color: #333;font-family: Halvetica,Aerial, sans-serif;">Create an account:<br></span>

		<form action="sign_up.php" method="POST">
		<input class="registration_form" type="text" name="fname" placeholder="First Name" style="width: 180px;" autofocus><span id="error">*<?php echo $_SESSION['fnameErr']; $_SESSION['fnameErr']=""; ?></span><br>
		<input class="registration_form" type="text" name="lname" placeholder="Last Name" style="width: 180px;"><span id="error"><?php echo $_SESSION['lnameErr']; $_SESSION['lnameErr']=""; ?></span><br>
		<input class="registration_form" type="text" name="username" placeholder="Username" style="width: 400px;"><span id="error">*<?php echo $_SESSION['usernameErr']; $_SESSION['usernameErr']=""; ?></span><br>
		<input class="registration_form" type="text" name="phone" placeholder="Mobile No" style="width: 400px;"><span id="error">*<?php echo $_SESSION['phoneErr']; $_SESSION['phoneErr']=""; ?></span><br>
		<input class="registration_form" type="radio" name="gender" style="width: 50px;" value="Male"><span>MALE</span>
		<input class="registration_form" type="radio" name="gender" style="width: 50px;" value="Female"><span>FEMALE</span><span id="error">*<?php echo $_SESSION['genderErr']; $_SESSION['genderErr']=""; ?></span><br>
		<input class="registration_form" type="text" name="mail" placeholder="Email" style="width: 400px;"><span id="error">*<?php echo $_SESSION['mailErr']; $_SESSION['mailErr']=""; ?></span><br>
		<input class="registration_form" type="password" name="pass" placeholder="Password" style="width: 400px;" ><span id="error">*<?php echo $_SESSION['passErr']; $_SESSION['passErr']=""; ?></span><br>
		<input class="registration_form" type="password" name="cpass" placeholder="Confirm Password" style="width: 400px;"><span id="error">*<?php echo $_SESSION['cpassErr']; $_SESSION['cpassErr']=""; ?></span><br>
		<input type="submit" value="Create account" name="reg_user" style="background-color: #534; color:white;border: 1px solid rgb(189, 199, 216); border-radius:4px; padding: 1vw; margin-left: 1vw;">
		</form>
	</div>
</body>
</html>
