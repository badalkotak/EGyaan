<?php

$targetfolder = "../uploads/textbook/";
 
 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
 

 $ok=1;
 $file_name=$_FILES['file']['name'];
$file_type=$_FILES['file']['type'];

 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
 {
include("dbcon.php");
//error_reporting(0);
//$c=$_REQUEST['course'];
$bookname=$_REQUEST['bookname'];
$bookname=mysqli_real_escape_string($con,$bookname);
$i=$_REQUEST['i'];
//$file=$_REQUEST['file'];
$path="../uploads/textbook/$file_name";
session_start();
  $user=$_SESSION['uname'];
  $c_uid=$_REQUEST['menu1'];


if($result=mysqli_query($con,"INSERT INTO `Textbook`(`CourseId`, `TextbookFile`, `TextbookName`) VALUES ('$c_uid','$path','$bookname')"))
{
echo "<script>alert('Textbook Uploaded!');window.location.href='textbook.php';</script>";
}
else
{
  echo "<script>alert('Error in uploading book! Please try again 1!');window.location.href='textbook.php';</script>";
  unlink($path);
}
}
else
{
  echo "<script>alert('Error in uploading book! Please try again 2!');window.location.href='textbook.php';</script>";
}

?>
