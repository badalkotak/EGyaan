<?php
include("../dbcon.php");
//error_reporting(0);
session_start();
$fname=$_REQUEST['fname'];
$lname=$_REQUEST['lname'];
$BatchId=$_REQUEST['br'];
$c_uid=$_REQUEST['menu'];
$email=$_REQUEST['email'];

function generatePassword($length = 4) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }
	
    return $result;
}
$pass=generatePassword();

$usr="$fname.$lname";

if($fname!="" && $lname!="" && $email!="")
{
if($result1 = mysqli_query($con,"INSERT INTO `Teacher`(`TeacherFname`, `TeacherLname`, `BatchId`, `TeacherEmail`, `TeacherPasswd`) VALUES ('$fname','$lname','$BatchId','$email','$pass')"))
{
$GetTeacherDetails=mysqli_query($con,"SELECT TeacherId FROM Teacher WHERE TeacherEmail='$email'");
while($GetRow=mysqli_fetch_array($GetTeacherDetails))
{
$TeacherId=$GetRow['TeacherId'];
}
if($result_teachercourse=mysqli_query($con,"INSERT INTO `TeacherCourse`(`TeacherId`, `CourseId`) VALUES ('$TeacherId','$c_uid')"))
{
    echo "<script>alert('Teacher successfully added!');window.location.href='../Teacher.php?menu1=$BatchId';</script>";
}
}
else
{
    echo "<script>alert('Teacher was not added!');window.location.href='../Teacher.php?menu1=$BatchId';</script>";
}
}
else
{
    echo "<script>alert('Teacher was not added!');window.location.href='../Teacher.php?menu1=$BatchId';</script>";
}
include("branch_teacher.php")
?>
