<?php
include("../dbcon.php");
error_reporting(0);

$r=$_REQUEST['rows'];
$delete=mysqli_query($con,"DELETE FROM `SlotTimetable` ");
if($result=mysqli_query($con,"INSERT INTO `SlotTimetable`(`Slot`) VALUES ('$r')"))
{
	echo "<script>alert('Settings updated Successfully!');window.location.href='../settings.php';</script>";
}
else
{
	echo "<script>alert('Unable to update settings!');window.location.href='../settings.php';</script>";
}
//header('Location: settings.php');
?>
