<?php
include("dbcon.php");
error_reporting(0);
session_start();

// $username=$_SESSION['uname'];
// $passwd=$_SESSION['passwd'];
// $branch=$_REQUEST['menu1'];
// $br=urldecode($branch);

// // if($_COOKIE[$c_name]=="Yes")
// // {
// // 	$_SESSION['uname'] = $username;
// // 	$_SESSION['passwd'] = $password;
// // }
// $result = mysqli_query($con,"SELECT * FROM `Student_Login` WHERE `username`='$username' AND `branch`='$br'");

// while($row = mysqli_fetch_array($result)) {$pwd=$row['passwd'];}
// if($username=="" || $password=="")
// {
// echo "<script>alert('Please input all fields!');window.location.href='index.php';</script>";
// }
// else if($password==$pwd)
// {
// $_SESSION['uname'] = $username;
// $_SESSION['passwd'] = $password;
// header();// This line of code is used to call a html page
// }
// else
// {
// echo "<script>alert('Invalid username/password!');window.location.href='index.php';</script>";
// }

$username=$_REQUEST["u"];
$password=$_REQUEST["p"];

$_SESSION['uname'] = $username;
$_SESSION['passwd'] = $password;

header('Location: StudentDashboard.php');
?>
