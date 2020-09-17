<?php
include 'connection.php';
include 'session.php';

echo $_SESSION['success'];
$_SESSION['success']="";
if(isset($_SESSION['scs'])) {
  echo $_SESSION['scs'];
  unset($_SESSION['scs']);
}
if(isset($_SESSION['deleted'])) {
  echo $_SESSION['deleted'];
  unset($_SESSION['deleted']);
}
if(isset($_SESSION['postid']))
{ unset($_SESSION['postid']); }
if(isset($_SESSION['postimage']))
{ unset($_SESSION['postimage']); }

function time_func($stored_time)
{
  $now=time();
  $seconds=round($now-$stored_time);
  $minutes=round($seconds/60);
    $hours=round($minutes/60);
    $days=round($hours/24);
    $weeks=round($days/7);
    $months=round($weeks/4);
    $years=round($months/12);
  if($seconds<=60)
  {
    if($seconds==1) {
      echo "One second ago";
    }
    else {
      echo "$seconds Seconds ago";
    }
  }
  else if($minutes<=60)
  {
    if($minutes==1) {
      echo "One Minute ago";
    }
    else {
      echo "$minutes Minutes ago";
    }
  }
  else if($hours<=24)
  {
    if($hours==1) {
      echo "One Hour ago";
    }
    else {
      echo "$hours Hours ago";
    }
  }
  else if($days<=7)
  {
    if($days==1) {
      echo "One Day ago";
    }
    else {
      echo "$days Days ago";
    }
  }
  else if($weeks<=4)
  {
    if($weeks==1) {
      echo "One Week ago";
    }
    else {
      echo "$weeks Weeks ago";
    }
  }
  else if($months<=12)
  {
    if($months==1) {
      echo "One Month ago";
    }
    else {
      echo "$months Months ago";
    }
  }
  else
  {
      if($years==1) {
        echo "One Year ago";
      }
      else {
        echo "$years Years ago";
      }
  }
}


?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<ul class="horizontal">
  <li class="list1"><img src="<?php echo $img_location; ?>" alt="Avatar" class="profilepic"></li>
  <li class="list1"><a class="active" href="home.php">Home</a></li>
  <li class="list1"><a href="profile_page.php">Profile</a></li>
  <li class="list1"><a href="edit_profile.php">Edit</a></li>
  <li class="list1"><a href="friendlist.php">Friend List</a></li>
    <li class="list1"><a href="myphotos.php">My Photos</a></li>
    <li class="list1"><a href="request_list.php">Friend requests</a></li>
    <li class ="searchinlist">
      <form action="search.php" method="POST">
        <input type="text" name="search" placeholder="Search" style="height: 20px;">
        <input style="background-color: #7d2019;color:white;" type="submit" value="Search" name="subsearch"></form>
  <li class="list1" style="float:right"><a href="logout.php">Logout</a></li>
</ul>
<p id="home">
<center>
    <div class="cap">
      Select image to upload:
    <br>
    <form method="post" action="post.php">
    <input type="file" name="fileToUpload" id="fileToUpload" class ="upload">
    <input type="text" name="caption" placeholder="Add a caption...">
    <input type="hidden" name="usernamee" value="<?php echo $username; ?>"><br>
    <input type="submit" value="Upload" name="submit" class="upload1">
  </div>
</center>
</form>

<?php
$result1=mysqli_query($conn, "SELECT * FROM `post` WHERE 1 ORDER BY `post_id` DESC");
while ($row1= mysqli_fetch_assoc($result1)) {
    $posted_time=$row1['created'];
    $post_image= $row1['post_image'];
    $unm=$row1['username'];
    $caption=$row1['content'];
    $postid=$row1['post_id'];
    $result2=mysqli_query($conn, "SELECT * FROM `friends` WHERE `un`='$username' AND `fun`='$unm'");
    if(mysqli_num_rows($result2)>0 || $unm==$username) {
      $result3=mysqli_query($conn, "SELECT * FROM `user` WHERE `username`='$unm'");
      $rowz=mysqli_fetch_assoc($result3);
?>
    <center>
    <br><br>
    
    <div style="height: 530px; width: 400px;border:2px solid black;">
    <pre>
      <img src="<?php echo $rowz['profile_picture']; ?>" alt="Avatar" style="float:left;width: 40px; height: 30px;margin: 0;border-radius: 50%;padding-right: 5px;margin-bottom: 2px;">
      <b style="float: left;">&nbsp;<?php echo $unm ?>&nbsp;:</b>&nbsp;
    </pre>
    <img src="<?php echo $post_image; ?>" style="height: 400px; width: 400px;" alt="Post image">
    <b style="  font-family: Helvetica, Arial, sans-serif;float: left;">
    <?php
    echo $unm;?>&nbsp;</b>
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
    <?php
    if($unm==$username) { ?>
    <form action="deletepost.php" method="POST">
      <input type="hidden" name="postid" value="<?php echo $postid ?>">
      <input type="submit" value="Delete" name="delsubmit">
    </form>
    <?php } ?>
  </th>
</table>
</div>
</center>
<?php
}
else {;
}
}
?>
</body>
</html>