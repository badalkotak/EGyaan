<?php
include("dbcon.php");
//error_reporting(0);
echo $id=$_REQUEST['del'];
$filename=mysqli_query($con,"SELECT * FROM Doubt WHERE Doubtid='$id'");
while ($row=mysqli_fetch_array($filename)) {
	$s_file=$row['StudentFile'];
	$t_file=$row['TeacherFile'];
}
if($s_file!="")
unlink($s_file);
else if($t_file!="")
unlink($t_file);
$result=mysqli_query($con,"DELETE FROM `Doubt` WHERE `Doubtid`='$id'");
header('Location: view_ans_doubts.php');
?>
