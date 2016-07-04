<?php
include("dbcon.php");
$targetfolder = "uploads/result/";
 session_start();
 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
 //echo $uid1=$_SESSION['uname'];
$uid=$_REQUEST['menu1'];
 $ok=1;
 $file_name=$_FILES['file']['name'];
$file_type=$_FILES['file']['type'];
 function generateuid($length = 10) {
    $chars = '0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }
	
    return $result;
}
$result_uid=generateuid();
 $result1=mysqli_query($con,"SELECT * FROM `branch` WHERE `uid`='$uid'");
while($row=mysqli_fetch_array($result1))
{
	$b=$row['branch'];
}
$title=$_REQUEST['title'];
$title=mysqli_real_escape_string($con,$title);
if($title!="" || $file_name!="")
{
 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
 
 {
 //echo "The file ". basename( $_FILES['file']['name']). " is uploaded";
error_reporting(0);
$path="uploads/result/$file_name";
if($result=mysqli_query($con,"INSERT INTO `result`(`branch`, `file`, `path`, `uid`, `title`) VALUES ('$b','$file_name','$path','$result_uid','$title')"))
{
	echo "<script>alert('Result Successfully added!');window.location.href='result.php';</script>";
}
else
{
	echo "<script>alert('Result was not added!');window.location.href='result.php';</script>";
}
}
else
{
	echo "<script>alert('Result was not added!');window.location.href='result.php';</script>";
}
}
else
{
	echo "<script>alert('Result was not added!');window.location.href='result.php';</script>";
}

?>