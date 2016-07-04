<?php
$user=$_REQUEST['u'];
$pass=$_REQUEST['p'];
session_start();
$_SESSION['uname'] = $user;
$_SESSION['passwd'] = $pass;
header('Location: AdminDashboard.php');
?>
