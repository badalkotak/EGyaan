<?php
include("../dbcon.php");
error_reporting(0);
$StudId=$_REQUEST["del"];
$br=mysqli_query($con,"SELECT BatchId FROM `Student` WHERE `StudentId`='$StudId'");
while($row=mysqli_fetch_array($br))
{
	$BatchId=$row['BatchId'];
}

if($result=mysqli_query($con,"DELETE FROM `Student` WHERE StudentId='$StudId'"))
{
echo "<script>alert('Student deleted successfully!');window.location.href='../VE_student.php?menu1=$BatchId';</script>";
}
else
{
echo "<script>alert('Problem in deleting student!');window.location.href='../VE_student.php?menu1=$BatchId';</script>";
}
//header('Location: VE_student.php?bruid='.$BatchId);
?>
