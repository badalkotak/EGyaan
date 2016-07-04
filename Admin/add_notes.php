<?php

echo $targetfolder = "../uploads/notes/";
 session_start();
 echo $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
 echo $uid1=$_SESSION['uname'];

 $ok=1;
 $file_name=$_FILES['file']['name'];
$file_type=$_FILES['file']['type'];

 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
 {
include("dbcon.php");
error_reporting(0);
$c=$_REQUEST['course'];
$bookname=$_REQUEST['bookname'];
$i=$_REQUEST['i'];
//$file=$_REQUEST['file'];
$path="../uploads/notes/$file_name";
session_start();
  $user=$_SESSION['uname'];
$result=mysqli_query($con,"SELECT * FROM `Teacher_Login` WHERE `email`='$user'");
  while($row=mysqli_fetch_array($result))
  {
    $br=$row['branch'];
  }
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
if($i>1)
{
  $c_uid=$_REQUEST['menu1'];
}
$course_name=mysqli_query($con,"SELECT * FROM `course_teacher` WHERE `uid`='$c_uid'");
while($row=mysqli_fetch_array($course_name))
{
  $c=$row['course'];
}
$title=$_REQUEST['title'];
$result=mysqli_query($con,"INSERT INTO `notes`(`course`, `notes`, `html_n`, `path`, `branch`, `uid`, `email`) VALUES ('$c','$file_name','$title','$path','$br','$uid','$user')");
echo "<script>alert('Notes Uploaded!');window.location.href='notes.php';</script>";
}
else
{
  echo "<script>alert('Error in uploading notes! Please try again!');window.location.href='notes.php';</script>";
}
?>