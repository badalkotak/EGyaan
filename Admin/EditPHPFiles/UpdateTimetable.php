<?php
include("../dbcon.php");
error_reporting(0);

  $uid=$_REQUEST['branch'];

  $result1=mysqli_query($con,"SELECT * FROM `SlotTimetable`");
    while($row=mysqli_fetch_array($result1)){$s=$row['Slot'];}
  $result=mysqli_query($con,"DELETE FROM `Timetable` WHERE `BatchId`='$uid'");
for($i=0;$i<$s;$i++)
{
	for($j=0;$j<=7;$j++)
	{
		$n="r".$i."c".$j;
		$val=$_REQUEST[$n];
    $val=mysqli_real_escape_string($con,$val);
    $result2=mysqli_query($con,"INSERT INTO `Timetable`(`BatchId`,`CellNo`,`CellValue`) VALUES ('$uid','$n','$val')");
		//$result1=mysqli_query($con,"UPDATE `slots_timetable` SET `slots`='$s1' WHERE `branch`='$br'");
	}
}
//echo "end";
$url="../view_tt.php?branch=$uid";
header('Location: '.$url);
?>
