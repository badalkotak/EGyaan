<?php
include("dbcon.php");
error_reporting(0);
echo $uid=$_REQUEST["del"];
$r=mysqli_query($con,"Select * From TeacherCourse where uid='$uid'");
while($d=mysqli_fetch_array($r))
{
	echo $email=$d['email'];
	$br=$d['branch'];
}

$result1=mysqli_query($con,"SELECT BatchId FROM `Teacher` WHERE `TeacherId`='$$uid'");
while($row=mysqli_fetch_array($result1))
{
	$BatchId=$row['BatchId'];
}
$result=mysqli_query($con,"DELETE FROM `Teacher` WHERE TeacherId='$uid'");

header('Location: teacher.php?menu1='.$BatchId);
?>
