<?php
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

function time_func1($stored_time)
{
  $now=time();
  $seconds=round($now-$stored_time);
  $minutes=round($seconds/60);
  $hours=round($minutes/60);
  $days=round($hours/24);
  $weeks=round($days/7);
  if($seconds<=60)
  {
    echo $seconds."s";
  }
  else if($minutes<=60)
  {
    echo $minutes."m";
  }
  else if($hours<=24)
  {
    echo $hours."h";
  }
  else if($days<=7)
  {
    echo $days."d";
  }
  else
  {
    echo $weeks."w";
  }
}

?>