<?php

include 'connection.php';
include 'session.php';
include 'time.php';
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
    <li class="list1"><a href="friendlist.php">Friend List</a></li>
    <li class="list1"><a href="myphotos.php">My Photos</a></li>
    <li class="list1"><a href="request_list.php">Friend requests</a></li>
    <li class="list1" style="height:40px;width: 180px;padding: 10px 15px;">
      <form action="search.php" method="POST">
        <input type="text" name="search" placeholder="Search" style="height: 20px;">
        <input style="background-color: #7d2019;color:white;" type="submit" value="Search" name="subsearch"></form>
  <li class="list1" style="float:right"><a href="logout.php">Logout</a></li>
</ul>
<?php
if(isset($_SESSION['postimage']))
{
	$post_image=$_SESSION['postimage'];
}
else
{
	$post_image=$_POST['post_image'];
}
?>
    <center>
    <img src="<?php echo $post_image ?>"><br>
    <?php
    if(isset($_SESSION['postid']))
    {
        $postid=$_SESSION['postid'];
    }
    else
    {
    	$postid=$_POST['post_id'];
    }
    $result1=mysqli_query($conn, "SELECT * FROM `comments` WHERE `post_id`='$postid' ORDER BY `comment_id` ASC");
    while($rowx=mysqli_fetch_assoc($result1))
    {
        $cc=$rowx['created'];
        $cuser_pic=$rowx['image']
    	?>
        <img src="<?php echo $cuser_pic; ?>" alt="Avatar" style="width: 40px; height: 30px;margin: 0;border-radius: 50%;padding-right: 5px;margin-bottom: 2px;">
    	<b><?php echo $rowx['username']; ?></b>&nbsp;<span><?php echo $rowx['content_comment']; ?></span><br>
        <i style="font-size: 12px;"><?php echo time_func1($cc); ?></i><br>
    	<?php
    }
    ?>
    <form action="commentphp.php" method="POST">
        <img src="<?php echo $img_location; ?>" alt="Avatar" style="width: 40px; height: 30px;margin: 0;border-radius: 50%;padding-right: 5px;margin-bottom: 2px;">
    	<b><?php echo $username ?>&nbsp;</b><input type="text" name="com" placeholder="Write a comment...">
    	<input type="hidden" name="post__id" value="<?php echo $postid ?>">
    	<input type="hidden" name="post__image" value="<?php echo $post_image ?>">
    	<input type="submit" name="commented" value="Post comment">
    </form>
</center>