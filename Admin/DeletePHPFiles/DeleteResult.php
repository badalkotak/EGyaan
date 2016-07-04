<?php
include("../dbcon.php");
error_reporting(0);
echo $name=$_REQUEST["del"];

$result=mysqli_query($con,"DELETE FROM `Result` WHERE ResultId='$name'");
$del_marks=mysqli_query($con,"DELETE FROM `StudentMarks` WHERE `ResultId`='$name'");
header('Location:../result.php');
?>
