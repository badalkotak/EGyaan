<?php

$targetfolder = "../uploads/notes/";
 session_start();
 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
 $uid1=$_SESSION['uname'];

 $ok=1;
 $file_name=$_FILES['file']['name'];
$file_type=$_FILES['file']['type'];

 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
 {
include("dbcon.php");
//error_reporting(0);
// $c=$_REQUEST['course'];


//$i=$_REQUEST['i'];
//$file=$_REQUEST['file'];
echo $path="../uploads/notes/$file_name";
session_start();
  $user=$_SESSION['uname'];


  echo $c_uid=$_REQUEST['menu1'];

echo $title=$_REQUEST['title'];
$title=mysqli_real_escape_string($con,$title);
if($result=mysqli_query($con,"INSERT INTO `Notes`(`NoteTitle`, `NoteFile`, `CourseId`) VALUES ('$title','$path','$c_uid')"))
{
echo "<script>alert('Notes Uploaded!');window.location.href='notes.php';</script>";
}
else
{
  echo "<script>alert('Error in uploading notes! Please try again! 1');window.location.href='notes.php';</script>";
  unlink($path);
}
}
else
{
  echo "<script>alert('Error in uploading notes! Please try again File! 2');window.location.href='notes.php';</script>";
}
?>
