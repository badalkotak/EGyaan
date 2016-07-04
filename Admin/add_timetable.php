<?php
include("dbcon.php");
error_reporting(0);
echo $uid=$_REQUEST['branch'];
session_start();
  $user=$_SESSION['uname'];
  $slot=mysqli_query($con,"SELECT * FROM `slots_timetable`");
  while ($row=mysqli_fetch_array($slot)) {
  	echo $s=$row['slots'];
  }
  $result1=mysqli_query($con,"SELECT * FROM `branch` WHERE `uid`='$uid'");
while($row=mysqli_fetch_array($result1))
{
  echo $br=$row['branch'];
}
  $del=mysqli_query($con,"DELETE FROM `Timetable` WHERE `branch`='$br'");
for($i=0;$i<$s;$i++)
{
	for($j=0;$j<=7;$j++)
	{
		$n="r".$i."c".$j;
		$val=$_REQUEST[$n];
		
		$result=mysqli_query($con,"INSERT INTO `Timetable`(`branch`, `value`, `id`) VALUES ('$br','$val','$n')");
	
	}
}
header('Location: branch_timetable_view.php');
?>