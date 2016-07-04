<?php

echo $targetfolder = "../uploads/assignment_student/";
 session_start();
 echo $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
 echo $uid1=$_SESSION['uname'];

 $ok=1;
 $file_name=$_FILES['file']['name'];
$file_type=$_FILES['file']['type'];

 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
 {
include("dbcon.php");
$sub_uid=$_REQUEST['upload'];

$result=mysqli_query($con,"SELECT * FROM `submission` WHERE `uid`='$sub_uid'");
while($row=mysqli_fetch_array($result))
{
	echo $course_uid=$row['Course_uid'];
}
$path=$targetfolder;
session_start();
$user=$_SESSION['uname'];

$u=mysqli_query($con,"Select * From Student_Login where username='$user'");
                  while($row= mysqli_fetch_array($u))
                  {
                    $usr=$row['fname']." ".$row['lname'];
                    $br=$row['branch'];
                    $stud_uid=$row['uid'];

                  }

echo $usr;
echo $br;
echo $stud_uid;
echo $file_name;

$insert=mysqli_query($con,"INSERT INTO `submission_report`(`uid`, `stud_name`, `stud_uid`, `path`, `course_uid`, `branch`) VALUES ('$sub_uid','$usr','$stud_uid','$path','$course_uid','$br')");

echo "<script>alert('Submission Done!');window.location.href='submission.php';</script>";
}
else
{
	echo "<script>alert('Error in submission! Please try again later!');window.location.href='submission.php';</script>";
}
?>