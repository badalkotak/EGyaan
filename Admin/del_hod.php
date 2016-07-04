<?php
include("dbcon.php");
error_reporting(0);
$name=$_REQUEST["del"];
$result=mysqli_query($con,"DELETE FROM `HOD_Login` WHERE uid='$name'");
include("hod.php");
?>
