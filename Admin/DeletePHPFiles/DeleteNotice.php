<?php
include("../dbcon.php");
error_reporting(0);
echo $name=$_REQUEST["del"];
$filename=mysqli_query($con,"SELECT `NoticeFile` FROM `NoticeBoard` WHERE `NoticeId`='$name'");
while ($row=mysqli_fetch_array($filename)) {
	$p=$row['NoticeFile'];}

unlink($p);

$result=mysqli_query($con,"DELETE FROM `NoticeBoard` WHERE NoticeId='$name'");
header('Location:../read_Notice.php');
?>
