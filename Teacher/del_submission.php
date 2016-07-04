<?php
include("dbcon.php");
error_reporting(0);
$b=$_REQUEST['del'];
$filename=mysqli_query($con,"SELECT * FROM Submission WHERE SubmissionId='$b'");
while ($row=mysqli_fetch_array($filename)) {
	echo $path=$row['SubmissionFile'];
}
unlink($path);
$result=mysqli_query($con,"DELETE FROM `Submission` WHERE `SubmissionId`='$b'");
header('Location: submission.php');
?>
