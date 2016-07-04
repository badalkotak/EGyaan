<?php
include("../dbcon.php");
error_reporting(0);
$name=$_REQUEST["del"];
$br_uid=$_REQUEST['menu1'];
$filename=mysqli_query($con,"SELECT SyllabusFile FROM Syllabus WHERE SyllabusId='$name'");
while ($row=mysqli_fetch_array($filename)) {
	$path=$row['SyllabusFile'];
}
unlink($path);
$result=mysqli_query($con,"DELETE FROM `Syllabus` WHERE SyllabusId='$name'");
header('Location:../syllabus.php?menu1='.$br_uid);
?>
