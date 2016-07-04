<?php
include("dbcon.php");
date_default_timezone_set("Asia/Calcutta");
error_reporting(0);
$date=$_REQUEST['date'];
$cuid=$_REQUEST['course'];

$check=mysqli_query($con,"SELECT * FROM Attendance WHERE CourseId='$cuid' && Dates='$date'");
while($row1=mysqli_fetch_array($check))
{
	$stud_uid=$row1['StudentId'];
}
if($stud_uid=="")
{
$result=mysqli_query($con,"SELECT * FROM StudentCourseRegistration WHERE CourseId='$cuid'");
while($row=mysqli_fetch_array($result))
{
	$StudentId=$row['StudentId'];

		echo $a=$_REQUEST[$StudentId];
		if($a=="P")
			$insert = mysqli_query($con,"INSERT INTO `Attendance`(`CourseId`, `StudentId`, `Attendance`, `Dates`) VALUES ('$cuid','$StudentId','P','$date')");
		else
			$insert = mysqli_query($con,"INSERT INTO `Attendance`(`CourseId`, `StudentId`, `Attendance`, `Dates`) VALUES ('$cuid','$StudentId','Ab','$date')");
	
}

header('Location: attendence.php');
}

else
{
	echo "<script>alert('Attendance for $date is already taken!');window.location.href='attendence.php';</script>";
}
?>
