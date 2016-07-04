<?php
include("../dbcon.php");
//error_reporting(0);

echo $BatchId=$_REQUEST["menu1"];
$c=$_REQUEST["course"];
$fees=$_REQUEST['fees'];
$c=mysqli_real_escape_string($con,$c);

$result1=mysqli_query($con,"SELECT * FROM `Batch` WHERE `BatchId`='$BatchId'");
while($row=mysqli_fetch_array($result1))
{
	echo $BatchName=$row['BatchName'];
}

$flag=0;
$course_check=mysqli_query($con,"SELECT * FROM `Course` WHERE `BatchId`='$BatchId'");
while($cr=mysqli_fetch_array($course_check))
{
     $cor=$cr['CourseName'];
    if($cor==$c)
    {
        echo "<script>alert('Course $c already exists in $BatchName!');window.location.href='../Course.php';</script>";
        $flag++;
    }
}

if($c!="" && $flag==0)
{
if($result = mysqli_query($con,"INSERT INTO `Course`(`CourseName`, `BatchId`, `Fees`) VALUES ('$c','$BatchId','$fees')"))
{
	echo "<script>alert('Course successfully added!');window.location.href='../Course.php';</script>";
}
else
{
	echo "<script>alert('Course was not added!');window.location.href='../Course.php';</script>";
}
}
else
{
	echo "<script>alert('Please input all fields!');window.location.href='course.php';</script>";
}
?>
