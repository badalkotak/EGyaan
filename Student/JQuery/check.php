<?php
include("../dbcon.php");
error_reporting(0);

$user=$_REQUEST['u'];
$pass=$_REQUEST['p'];
$br=$_REQUEST['br'];

if($user=="" || $pass=="")
{
	echo "E";
}
else
{
$result=mysqli_query($con,"SELECT * FROM `Student` WHERE `StudentEmail`='$user' && BatchId = '$br'");
while($row=mysqli_fetch_array($result))
{
	$pwd=$row['StudentPasswd'];
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