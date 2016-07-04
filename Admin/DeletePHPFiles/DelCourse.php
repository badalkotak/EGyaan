<?php
include("dbcon.php");
error_reporting(0);
$uid=$_REQUEST['del'];
$result=mysqli_query($con,"DELETE FROM `courses` WHERE `Course_uid`='$uid'");
$del_attendence=mysqli_query($con,"DELETE FROM `Attendence` WHERE `course_uid`='$uid'");
$del_course_reg=mysqli_query($con,"DELETE FROM `course_reg` WHERE `course_uid`='$uid'");
$del_course_teacher=mysqli_query($con,"DELETE FROM `course_teacher` WHERE `uid`='$uid'");

$filename=mysqli_query($con,"SELECT * FROM doubts WHERE Course_uid='$uid'");
while ($row=mysqli_fetch_array($filename)) {
	$s_file=$row['student_file'];
	$t_file=$row['teacher_file'];
	if($s_file!="")
unlink($s_file);
else if($t_file!="")
unlink($t_file);
}
$del_doubts=mysqli_query($con,"DELETE FROM `doubts` WHERE `Course_uid`='$uid'");
$filename=mysqli_query($con,"SELECT path FROM notes WHERE course_uid='$uid'");
while ($row=mysqli_fetch_array($filename)) {
	$path=$row['path'];
}
unlink($path);
$del_notes=mysqli_query($con,"SELECT * FROM `notes` WHERE `course_uid`='$uid'");

$filename=mysqli_query($con,"SELECT path FROM submission WHERE Course_uid='$uid");
while ($row=mysqli_fetch_array($filename)) {
	$path=$row['path'];
}
unlink($path);
$del_submission=mysqli_query($con,"DELETE FROM `submission` WHERE `Course_uid`='$uid'");

$del_sub_report=mysqli_query($con,"DELETE FROM `submission_report` WHERE `course_uid`='$uid'");
$filename=mysqli_query($con,"SELECT path FROM syllabus WHERE course='$uid'");
while ($row=mysqli_fetch_array($filename)) {
	$path=$row['path'];
}
unlink($path);
$del_syllabus=mysqli_query($con,"DELETE FROM `syllabus` WHERE `course`='$uid'");

$filename=mysqli_query($con,"SELECT path FROM Textbooks WHERE course_uid='$uid");
while ($row=mysqli_fetch_array($filename)) {
	$path=$row['path'];
}
unlink($path);
$del_textbook=mysqli_query($con,"DELETE FROM `Textbooks` WHERE `course_uid`='$uid'");

header('Location: course.php')
?>
