<?php

include 'connection.php';
include 'session.php';
if(isset($_SESSION['u']))
{
	echo $_SESSION['u'];
	unset($_SESSION['u']);
}
if(isset($_SESSION['postid']))
{ unset($_SESSION['postid']); }
if(isset($_SESSION['postimage']))
{ unset($_SESSION['postimage']); }

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor="lightgrey" background="bg2.png" style="background-size: cover;background-attachment: fixed;">

<ul class="horizontal">
    <li class="list1"><img src="<?php echo $img_location; ?>" alt="Avatar" style="width: 60px; height: 50px;margin: 0;padding: 0;border-radius: 50%;padding-right: 5px;"></li>
    <li class="list1"><a href="home.php">Home</a></li>
    <li class="list1"><a href="profile_page.php">Profile</a></li>
    <li class="list1"><a href="edit_profile.php">Edit</a></li>
    <li class="list1"><a class="active" href="friendlist.php">Friend List</a></li>
    <li class="list1"><a href="myphotos.php">My Photos</a></li>
    <li class="list1"><a href="request_list.php">Friend requests</a></li>
    <li class="list1" style="height:40px;width: 180px;padding: 10px 15px;">
    <form action="search.php" method="POST">
        <input type="text" name="search" placeholder="Search" style="height: 20px;">
        <input style="background-color: #7d2019;color:white;" type="submit" value="Search" name="subsearch">
      </form>
    </li>
    <li class="list1" style="float:right"><a href="logout.php">Logout</a></li>
</ul>

<?php

$resu=mysqli_query($conn, "SELECT * FROM `friends` WHERE `un`='$username' ORDER BY `friend_id` DESC");
if(mysqli_num_rows($resu)==0)
{
  ?>
  <center>No any friends!!!</center>
  <?php
}
else
{
while($rowx=mysqli_fetch_assoc($resu))
{
    $fun=$rowx['fun'];
	$res1=mysqli_query($conn, "SELECT * FROM `user` WHERE `username`='$fun'");
	$rowy=mysqli_fetch_assoc($res1);
	$pp1=$rowy['profile_picture'];
	$fn=$rowy['firstname'];
	$ln=$rowy['lastname'];
	$un1=$rowy['username'];
?>
<center>
<?php
  echo $fn;
  echo "&nbsp;";
  echo $ln;
?>
  <br>
  <img style="border: 3px solid white; height: 105px; width: 105px; border-radius: 80%;" src="<?php echo $pp1; ?>" alt="Profile picture">
 <form action="unfriend.php" method="POST">
 	<input type="hidden" name="uf" value="<?php echo $un1 ?>">
    <input type="submit" value="Unfriend" name="unfriend">
</form>
</center>
<br>
<?php
}
}
?>

</body>
</html>