<?php
include("dbcon.php");
error_reporting(0);
$b=$_REQUEST['del'];
$filename=mysqli_query($con,"SELECT path FROM Textbook WHERE TextbookId='$b'");
while ($row=mysqli_fetch_array($filename)) {
	$path=$row['path'];
}
unlink($path);
$result=mysqli_query($con,"DELETE FROM `Textbook` WHERE `TextbookId`='$b'");
header('Location: textbook.php');
?>
