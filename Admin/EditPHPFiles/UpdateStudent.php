<?php
include("../dbcon.php");
error_reporting(0);
$uid=$_REQUEST['uid'];
$fname=$_REQUEST['fname'];
$lname=$_REQUEST['lname'];
$br_uid=$_REQUEST['menu1'];
$pfname=$_REQUEST['pfname'];
$mn=$_REQUEST['mn'];
$pmn=$_REQUEST['pmn'];
$pe=$_REQUEST['pe'];
$se=$_REQUEST['se'];
$gender=$_REQUEST['gender'];
$t=$_REQUEST['t'];
$fname=trim($fname);
$lname=trim($lname);
$pfname=trim($pfname);

$pe=trim($pe);
$se=trim($se);

$bruid=$br_uid;

if($fname!="" && $lname!="" && $pfname!="" && $mn!="" && $pe!="" && $se!="")
{

$count=mysqli_query($con,"SELECT COUNT(CourseId) FROM Course WHERE BatchId='$br_uid'");
while($countrow=mysqli_fetch_array($count))
{
	$t=$countrow['COUNT(CourseId)'];
}
$result = mysqli_query($con,"UPDATE `Student` SET `StudentFname`='$fname',`StudentLname`='$lname',`BatchId`='$br_uid',`StudentEmail`='$se',`StudentMobile`='$mn',`StudentGender`='$gender',`ParentName`='$pfname',`ParentEmail`='$pe',`ParentMobile`='$pmn' WHERE StudentId='$uid'");
$delete = mysqli_query($con,"DELETE FROM `StudentCourseRegistration` WHERE `StudentId`='$uid'");
for($j=0;$j<$t;$j++)
{
	echo $c=$_REQUEST[$j];
	if($c!="")
	{
		$insert = mysqli_query($con, "INSERT INTO `StudentCourseRegistration`(`StudentId`, `CourseId`) VALUES ('$uid','$c')");
	}
}
header('Location: ../VE_student.php?menu1='.$br_uid);
}

else
{
	echo "<script>alert('Input All fields!');window.location.href='../edit_student.php?edit=$uid&bruid=$br_uid';</script>";   
}
?>
