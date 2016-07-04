<?php
include("../dbcon.php");
error_reporting(0);
 $targetfolder = "../../uploads/syllabus/";
 session_start();
  $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;

 $ok=1;
 $file_name=$_FILES['file']['name'];
$file_type=$_FILES['file']['type'];
if($file_name!="")
{
$uid=$_REQUEST['br_uid'];
 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
 {
 

$course=$_REQUEST['menu1'];

$path="../uploads/syllabus/$file_name";

if($result=mysqli_query($con,"INSERT INTO `Syllabus`(`CourseId`, `SyllabusFile`, `BatchId`) VALUES ('$course','$path','$uid')"))
{
    echo "<script>alert('Syllabus Successfully added!');window.location.href='../syllabus.php?menu1=$uid';</script>";
}
else
{
    echo "<script>alert('Syllabus was not added 1!');window.location.href='../syllabus.php?menu1=$uid';</script>";
}

}
else
{
    echo "<script>alert('Syllabus was not added 2!');window.location.href='../syllabus.php?menu1=$uid';</script>";
}
}
else
{
    echo "<script>alert('Syllabus was not added 3!');window.location.href='../syllabus.php?menu1=$uid';</script>";
}

//echo "UID:".$uid;
?>
