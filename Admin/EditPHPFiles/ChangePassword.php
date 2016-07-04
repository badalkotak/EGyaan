<?php
include("../dbcon.php");
error_reporting(0);
session_start();

$current=$_REQUEST['current_pass'];
$new=$_REQUEST['new_pass'];
$new2=$_REQUEST['new_pass_2'];

$result=mysqli_query($con,"SELECT * FROM `AdminLogin`");
while($row = mysqli_fetch_array($result))
{
	$pass=$row['Passwd'];
}

if($current==$pass)
{
	if($new==$new2)
	{
		if($update_pass=mysqli_query($con,"UPDATE `AdminLogin` SET `Passwd`='$new' WHERE `Username`='admin'"))
		{
			echo "<script>alert('Password updated Successfully!');window.location.href='../settings.php';</script>";
		}
		//header('Location: settings.php');
		//echo "Password successfully updated";
	}
	else
	{
		echo "<script>alert('Unable to update Password!');window.location.href='../settings.php';</script>";
		//echo "The new passwords did not match!";
	}
}
?>
