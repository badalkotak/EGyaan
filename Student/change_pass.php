<?php
include("dbcon.php");
error_reporting(0);
session_start();

$user=$_SESSION['uname'];
$current=$_REQUEST['current_pass'];
$new=$_REQUEST['new_pass'];
$new2=$_REQUEST['new_pass_2'];

$result=mysqli_query($con,"SELECT * FROM `Student_Login` WHERE username='$user'");
while($row = mysqli_fetch_array($result))
{
	$pass=$row['passwd'];
}

if($current!="" || $new!="" || $new2!="")
{
if($current==$pass)
{
	if($new==$new2)
	{
		$update_pass=mysqli_query($con,"UPDATE `Student_Login` SET `passwd`='$new' WHERE `username`='$user'");
		echo "<script>alert('Password Updated!');window.location.href='settings.php';</script>";
		// header('Location: settings.php');
	}
	else
	{
		echo "<script>alert('The new passwords did not match!');window.location.href='settings.php';</script>";
	}
}
else
{
	echo "<script>alert('Invalid current password!');window.location.href='settings.php';</script>";
}
}
else
{
	echo "<script>alert('Input all fields!');window.location.href='settings.php';</script>";	
}
?>