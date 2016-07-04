<?php
include("../dbcon.php");
//error_reporting(0);
echo $uid=$_REQUEST['del'];

/*$del_attendence=mysqli_query($con,"DELETE FROM `Attendence` WHERE `course_uid`='$uid'");
$del_course_reg=mysqli_query($con,"DELETE FROM `course_reg` WHERE `course_uid`='$uid'");
$del_course_teacher=mysqli_query($con,"DELETE FROM `course_teacher` WHERE `uid`='$uid'");*/

$filename=mysqli_query($con,"SELECT * FROM Doubt WHERE CourseId='$uid'");
while ($row=mysqli_fetch_array($filename)) {
	$s_file=$row['StudentFile'];
	$t_file=$row['TeacherFile'];
	if($s_file!="")
unlink($s_file);
else if($t_file!="")
unlink($t_file);
}
//$del_doubts=mysqli_query($con,"DELETE FROM `doubts` WHERE `Course_uid`='$uid'");
$filename=mysqli_query($con,"SELECT NoteFile FROM Notes WHERE CourseId='$uid'");
while ($row=mysqli_fetch_array($filename)) {
	$path="../".$row['NoteFile'];
}
unlink($path);
//$del_notes=mysqli_query($con,"SELECT * FROM `Submission` WHERE `CourseId`='$uid'");

$filename=mysqli_query($con,"SELECT SubmissionFile FROM Submission WHERE CourseId='$uid");
while ($row=mysqli_fetch_array($filename)) {
	$path="../".$row['SubmissionFile'];
}
unlink($path);
//$del_submission=mysqli_query($con,"DELETE FROM `Submission` WHERE `CourseId`='$uid'");

//$del_sub_report=mysqli_query($con,"DELETE FROM `submission_report` WHERE `course_uid`='$uid'");
$filename=mysqli_query($con,"SELECT SyllabusFile FROM Syllabus WHERE CourseId='$uid'");
while ($row=mysqli_fetch_array($filename)) {
	$path="../".$row['SyllabusFile'];
}
unlink($path);
//$del_syllabus=mysqli_query($con,"DELETE FROM `syllabus` WHERE `course`='$uid'");

$filename=mysqli_query($con,"SELECT TextbookFile FROM Textbook WHERE CourseId='$uid");
while ($row=mysqli_fetch_array($filename)) {
	$path="../".$row['TextbookFile'];
}
unlink($path);
//$del_textbook=mysqli_query($con,"DELETE FROM `Textbooks` WHERE `course_uid`='$uid'");

if($result=mysqli_query($con,"DELETE FROM `Course` WHERE `CourseId`='$uid'"))
header('Location: ../Course.php')
?>
