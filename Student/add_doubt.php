<?php
include("dbcon.php");
error_reporting(0);
session_start();
 $targetfolder = "../uploads/student_doubt/";
 session_start();
  $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
 $uid1=$_SESSION['uname'];


 $ok=1;
 $file_name=$_FILES['file']['name'];
$file_type=$_FILES['file']['type'];

 move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder);
 
$user=$_SESSION['uname'];
	  $result0 = mysqli_query($con,"SELECT * FROM `Student` WHERE `StudentEmail`='$user'");
	  while($row = mysqli_fetch_array($result0))
	  {
	  	$br=$row['BatchId'];
	  	$sid=$row['StudentId'];

	  }
 $sub=$_REQUEST['menu1'];


  $title = $_REQUEST['question'];

if($title=="")
echo "<script>alert('Input all fields!');window.location.href='read_doubts.php';</script>";
 



if($file_name=="")
{
	$targetfolder="";
}
else
{
	echo $targetfolder = "../uploads/student_doubt/$file_name";
}
if($result = mysqli_query($con,"INSERT INTO `Doubt`(`Question`, `CourseId`, `StudentFile`, `StudentID`) VALUES ('$title','$sub','$targetfolder','$sid')"))
{

	echo "<script>alert('Doubt successfully posted!');window.location.href='read_doubts.php';</script>";
}
else
{

echo "<script>alert('Doubt was not posted!');window.location.href='read_doubts.php';</script>";
}
?>
