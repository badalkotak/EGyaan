<?php
include("dbcon.php");
error_reporting(0);
session_start();
$username=$_REQUEST["u"];
$password=$_REQUEST["p"];

$_SESSION['uname']=$username;
header('Location: TeacherDashboard.php');
// $result = mysqli_query($con,"SELECT * FROM `Teacher_Login` WHERE `email`='$username'");

// while($row = mysqli_fetch_array($result)) {$pawd=$row['passwd'];}
// if($username=="" || $password=="")
// {
// echo "<script>alert('Please input all fields!');window.location.href='index.php';</script>";
// }
// else if($password==$pawd)
// {
// $_SESSION['uname']=$username;
// header('Location: TeacherDashboard.php');// This line of code is used to call a html page
// }
// else
// {
// echo "<script>alert('Invalid username/password!');window.location.href='index.php';</script>";
// }
?>
