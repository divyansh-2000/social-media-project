<?php

include 'connection.php';
include 'session.php';
include'time.php';
if(isset($_SESSION['deleted']))
{
  echo $_SESSION['deleted'];
  unset($_SESSION['deleted']);
}
if(isset($_SESSION['postid']))
{
  unset($_SESSION['postid']);
}
if(isset($_SESSION['postimage']))
{
  unset($_SESSION['postimage']);
}

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
    <li class="list1"><a class="active" href="myphotos.php">My Photos</a></li>
    <li class="list1"><a href="request_list.php">Friend requests</a></li>
    <li class="list1" style="height:40px;width: 180px;padding: 10px 15px;">
    <form action="search.php" method="POST">
      <input type="text" name="search" placeholder="Search" style="height: 20px;">
      <input style="background-color: #7d2019;color:white;" type="submit" value="Search" name="subsearch">
    </form></li>
    <li class="list1" style="float:right"><a href="logout.php">Logout</a></li>
  </ul>


  <?php
  $result1=mysqli_query($conn, "SELECT * FROM `post` WHERE `username`='$username' ORDER BY `post_id` DESC");
  if(mysqli_num_rows($result1)>0)
  {
	  while($rowx=mysqli_fetch_assoc($result1))
	  {
	    $postp=$rowx['post_image'];
	    $postid=$rowx['post_id'];
      $caption=$rowx['content'];
      $posted_time=$rowx['created'];
      ?>
	    <center>
    <br><br>
    
    <div style="height: 530px; width: 400px;border:2px solid black;">
    <pre>
      <img src="<?php echo $img_location; ?>" alt="Avatar" style="float:left;width: 40px; height: 30px;margin: 0;border-radius: 50%;padding-right: 5px;margin-bottom: 2px;">
      <b style="float: left;">&nbsp;<?php echo $username ?>&nbsp;:</b>&nbsp;
    </pre>
    <img src="<?php echo $postp; ?>" style="height: 400px; width: 400px;" alt="Post image">
    <b style="  font-family: Helvetica, Arial, sans-serif;float: left;">
    <?php
    echo $username;?>&nbsp;</b>
    <i style="font-family: Helvetica, Arial, sans-serif;float: left;">
    <?php
    echo $caption;?>&nbsp;&nbsp; <?php time_func($posted_time); ?><br>
    </i>
    </pre>
    <table style="text-align: left;padding:20px 20px 25px 25px;">
  <th>
        <form action="comment.php" method="POST">
          <input type="hidden" name="post_id" value="<?php echo $postid ?>">
          <input type="hidden" name="cun" value="<?php echo $username ?>">
          <input type="hidden" name="postun" value="<?php echo $unm ?>">
          <input type="hidden" name="post_image" value="<?php echo $post_image ?>">
          <input type="submit" value="Comments" name="comment">
        </form>
      </th>
      <th>
        <form action="deletepost.php" method="POST">
          <input type="hidden" name="postid" value="<?php echo $postid ?>">
          <input type="submit" value="Delete" name="delsubmit1">
        </form>
      </th>
    </table>
  </div>
      </center>
      <?php
    }
  }
  else
  {
    echo "<center>";
    echo "No uploaded photos!";
    echo "</center>";
  }
  ?>
</body>
</html>