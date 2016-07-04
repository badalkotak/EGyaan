<?php
include("dbcon.php");
$dates = array();
$count=0;
$result=mysqli_query($con,"SELECT DISTINCT  FROM Attendence WHERE course_uid='9588464638'");
while($row=mysqli_fetch_array($result))
{
  $date=$row['date'];
  if($count<=6)
  {
  array_push($dates, $date);
  $count++;
 }
}

var_dump($dates);
?>