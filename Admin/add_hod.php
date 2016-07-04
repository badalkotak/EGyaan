<?php
include("dbcon.php");
error_reporting(0);
$fname=$_REQUEST['fname'];
$lname=$_REQUEST['lname'];
$br_uid=$_REQUEST['menu1'];
$email=$_REQUEST['email'];
$pass="";
function generatePassword($length = 4) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }
	
    return $result;
}
$pass=generatePassword();
function generateuid($length = 10) {
    $chars = '0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }
	
    return $result;
}
$uid=generateuid();
$result1=mysqli_query($con,"SELECT * FROM `branch` WHERE `uid`='$br_uid'");
while($row=mysqli_fetch_array($result1))
{
    $branch=$row['branch'];
}

$result = mysqli_query($con,"INSERT INTO `HOD_Login`(`uid`, `username`, `passwd`, `fname`, `lname`, `branch`, `Branch_uid`) VALUES ('$uid','$email','$pass','$fname','$lname','$branch','$br_uid')");
header('Location: hod.php');
?>
