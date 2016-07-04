<?php
include("dbcon.php");
date_default_timezone_set("Asia/Calcutta");
error_reporting(0);
echo $date=date("d/m/Y");
$cuid=$_REQUEST['course'];

$check=mysqli_query($con,"SELECT * FROM Attendence WHERE course_uid='$cuid' && date='$date'");
while($row1=mysqli_fetch_array($check))
{
	$stud_uid=$row1['stud_uid'];
}
if($stud_uid=="")
{
$result=mysqli_query($con,"SELECT * FROM course_reg WHERE course_uid='$cuid'");
while($row=mysqli_fetch_array($result))
{
	$email=$row['semail'];
	$sname=mysqli_query($con,"SELECT uid FROM Student_Login WHERE semail='$email'");
	while($srow=mysqli_fetch_array($sname))
	{
		$suid=$srow['uid'];

		$a=$_REQUEST[$suid];
		if($a=="P")
			$insert = mysqli_query($con,"INSERT INTO `Attendence`(`course_uid`, `stud_uid`, `attend`, `date`) VALUES ('$cuid','$suid','$a','$date')");
		else
			$insert = mysqli_query($con,"INSERT INTO `Attendence`(`course_uid`, `stud_uid`, `attend`, `date`) VALUES ('$cuid','$suid','Ab','$date')");
	}
}

header('Location: logout.php');
}

else
{
	echo "<script>alert('Attendance for $date is already taken!');window.location.href='logout.php';</script>";
}
?>
