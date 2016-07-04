<?php
$date=$_REQUEST['date'];
 $c_uid=$_REQUEST['menu1'];
 $title=$_REQUEST['title'];

 $targetfolder = "../uploads/submission/";
 session_start();
 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;

 $ok=1;
 $file_name=$_FILES['file']['name'];
$file_type=$_FILES['file']['type'];

 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
 {

include("dbcon.php");
error_reporting(0);
$path="../uploads/submission/$file_name";
session_start();
$user=$_SESSION['uname'];

 
// if($i>1)
// {
//   $c_uid=$_REQUEST['menu1'];
// }

$today=date('m/d/Y');
 $today;
if($insert=mysqli_query($con,"INSERT INTO `Submission`(`SubmissionTitle`, `SubmissionFile`, `DateOfSubmission`, `DateOfUpload`, `CourseId`) VALUES ('$title','$path','$date','$today','$c_uid')"))
{
echo "<script>alert('Assignment Uploaded!');window.location.href='submission.php';</script>";
}
else
{
unlink($path);
echo "<script>alert('Error in uploading submission!');window.location.href='submission.php';</script>";
}
}
else
{
  echo "<script>alert('Error in uploading assignment! Please try again!');window.location.href='submission.php';</script>";
}
?>
