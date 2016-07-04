<?php
include("../dbcon.php");
error_reporting(0);

$user=$_REQUEST['u'];
$pass=$_REQUEST['p'];

if($user=="" || $pass=="")
{
	echo "E";
}
else
{
$result=mysqli_query($con,"SELECT * FROM `AdminLogin` WHERE `Username`='$user'");
while($row=mysqli_fetch_array($result))
{
	$pwd=$row['Passwd'];
}

if($pwd==$pass)
{
	echo "S";
}
else
{
	echo "F";
}
}
?>
