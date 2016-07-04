<?php
include("../dbcon.php");
//error_reporting(0);
$i=$_REQUEST['total'];
$e=$_REQUEST['e'];
$br_uid=$_REQUEST['br'];
if($getId=mysqli_query($con,"SELECT StudentId FROM Student WHERE StudentEmail='$e'"))
{
while($row=mysqli_fetch_array($getId))
{
	echo $StudentId=$row['StudentId'];
}
}

else
{
echo "<script>alert('First you need to add a student!');window.location.href='../Student.php?';</script>";
}
if($StudentId!="")
{
for($j=0;$j<$i;$j++)
{
	$c=$_REQUEST[$j];
	if($c!="")
	{
		$insert = mysqli_query($con,"INSERT INTO `StudentCourseRegistration`(`StudentId`, `CourseId`) VALUES ('$StudentId','$c')");
	}
}

header('Location: ../VE_student.php?menu1='.$br_uid);
}

else
{
	echo "<script>alert('Student is already registered!');window.location.href='../VE_student.php?menu1=$br_uid';</script>";
}
?>
