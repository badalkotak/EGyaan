<?php
include("dbcon.php");
//error_reporting(0);

$sub_uid=$_REQUEST['s'];echo "<br>";
$stud_uid=$_REQUEST['del'];

$report = mysqli_query($con,"SELECT * FROM `submission_report` WHERE `uid`='$sub_uid' AND `stud_uid`='$stud_uid'");
while($report_arr=mysqli_fetch_array($report))  
{
  $path=$report_arr['path'];
}

if(unlink($path) && $delete=mysqli_query($con,"DELETE FROM `submission_report` WHERE `uid`='$sub_uid' AND `stud_uid`='$stud_uid'"))
{
	
	echo "<script>alert('File Deleted!');window.location.href='detailed_submission.php?detail=$sub_uid';</script>";
}
else
{
	echo "<script>alert('Problem in deleteing file!');window.location.href='detailed_submission.php?detail=$sub_uid';</script>";
}

?>