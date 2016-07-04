<?php
include("dbcon.php");
error_reporting(0);
$b=$_REQUEST['del'];
$filename=mysqli_query($con,"SELECT NoteFile FROM Notes WHERE NoteId='$b");
while ($row=mysqli_fetch_array($filename)) {
	$path=$row['NoteFile'];
}
unlink($path);
$result=mysqli_query($con,"DELETE FROM `Notes` WHERE `NoteId`='$b'");
header('Location: notes.php');
?>
