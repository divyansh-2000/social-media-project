<?php

include 'connection.php';
include 'session.php';

if(isset($_SESSION['d']))
{
	echo $_SESSION['d'];
	unset($_SESSION['d']);
}
if(isset($_SESSION['postid']))
{ unset($_SESSION['postid']); }
if(isset($_SESSION['postimage']))
{ unset($_SESSION['postimage']); }

?>
<!DOCTYPE html>
<html>
<head>
<style>
ul.horizontal {
  list-style-type: none;
  margin: 0;
  width: 98%;
  padding: 1.5%;
  overflow: hidden;
  background-color: #534;
}
ul.vertical {
  list-style-type: none;
  margin: 0;
  padding: 0;
  margin-top: 0px;
  width: 150px;
  height: 600px;
  background-color: #333;
}
li a.list2 {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}
li.list1 {
  float: left;
  border-right:2px solid #bbb;
}
li:last-child {
  border-right: none;
}
li a {
  display: block;
  color: white;
  text-align: center;
  padding: 18px 25px;
  text-decoration: none;
}
li a:hover:not(.active) {
  background-color: #111;
}
.active {
  background-color: #86DF20;
}
</style>
</head>
<body bgcolor="lightgrey" background="bg2.png" style="background-size: cover;background-attachment: fixed;">

<ul class="horizontal">
  <li class="list1"><img src="<?php echo $img_location; ?>" alt="Avatar" style="width: 60px; height: 50px;margin: 0;padding: 0;border-radius: 50%;padding-right: 5px;"></li>
  <li class="list1"><a href="home.php">Home</a></li>
  <li class="list1"><a href="profile_page.php">Profile</a></li>
  <li class="list1"><a href="edit_profile.php">Edit</a></li>
  <li class="list1"><a href="friendlist.php">Friend List</a></li>
    <li class="list1"><a href="myphotos.php">My Photos</a></li>
    <li class="list1"><a class="active" href="request_list.php">Friend requests</a></li>
    <li class="list1" style="height:40px;width: 180px;padding: 10px 15px;">
      <form action="search.php" method="POST">
        <input type="text" name="search" placeholder="Search" style="height: 20px;">
        <input style="background-color: #7d2019;color:white;" type="submit" value="Search" name="subsearch"></form>
  <li class="list1" style="float:right"><a href="logout.php">Logout</a></li>
</ul>

<?php

$resu=mysqli_query($conn, "SELECT * FROM `friend_requests` WHERE `run`='$username' ORDER BY `request_id` DESC");
if(mysqli_num_rows($resu)==0)
{
  ?>
  <center>No friend requests!!!</center>
  <?php
}
else
{
while($rowx=mysqli_fetch_assoc($resu))
{
    $un=$rowx['un'];
	$res1=mysqli_query($conn, "SELECT * FROM `user` WHERE `username`='$un'");
	$rowy=mysqli_fetch_assoc($res1);
	$pp1=$rowy['profile_picture'];
	$fn=$rowy['firstname'];
	$ln=$rowy['lastname'];
?>
<center>
<?php
  echo $fn;
  echo "&nbsp;";
  echo $ln;
?>
  <br>
  <img style="border: 3px solid white; height: 105px; width: 105px; border-radius: 80%;" src="<?php echo $pp1; ?>" alt="Profile picture">
 <form action="addfriend.php" method="POST">
 	<input type="hidden" name="au" value="<?php echo $un; ?>">
    <input type="submit" value="Accept" name="accept">
</form>
<form action="unfriend.php" method="POST">
 	<input type="hidden" name="du" value="<?php echo $un; ?>">
    <input type="submit" value="Delete" name="reject">
</form>
</center>
<br>
<?php
}
}
?>

</body>
</html>