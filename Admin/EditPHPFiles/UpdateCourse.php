<?php
include("../dbcon.php");
//error_reporting(0);

$uid=$_REQUEST['uid'];
$cname=$_REQUEST['course'];
$fees=$_REQUEST['fees'];

$update=mysqli_query($con,"UPDATE `Course` SET `CourseName`='$cname',`Fees`='$fees' WHERE `CourseId`='$uid'");
header('Location: ../Course.php');
?>
