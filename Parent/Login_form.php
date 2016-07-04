<?php
//include("dbcon.php");
error_reporting(0);
session_start();
$username=$_REQUEST["u"];
$password=$_REQUEST["p"];
$_SESSION['uname'] = $username;
$_SESSION['passwd'] = $password;
header('Location: ParentDashboard.php');
// $username=$_SESSION['uname'];
// $passwd=$_SESSION['passwd'];

// $result = mysqli_query($con,"SELECT * FROM `Student_Login` WHERE `pemail`='$username'");

// while($row = mysqli_fetch_array($result)) {$pwd=$row['Ppass'];}
// if($username=="" || $password=="")
// {
// echo "<script>alert('Please input all fields!');window.location.href='index.php';</script>";
// }
// else if($passwd==$pwd)
// {
// header('Location: ParentDashboard.php');// This line of code is used to call a html page
// }
// else
// {
// echo "<script>alert('Invalid username/password!');window.location.href='index.php';</script>";
// }
?>
