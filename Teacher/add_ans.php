<?php
include("dbcon.php");
error_reporting(0);

echo $targetfolder = "../uploads/teacher_doubt/";
 session_start();
 echo $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
 echo $uid1=$_SESSION['uname'];

 $ok=1;
 $file_name=$_FILES['file']['name'];
$file_type=$_FILES['file']['type'];
echo $ans=$_REQUEST['ans'];
echo $d=$_REQUEST['quest'];

if($file_name!="")
{
move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder);
$result = mysqli_query($con,"UPDATE `Doubt` SET `Answer`='$ans',`TeacherFile`='$targetfolder' WHERE `Doubtid`='$d'");
}

else
{
	$result = mysqli_query($con,"UPDATE `doubts` SET `answer`='$ans' WHERE `id`='$d'");
}

header('Location: view_ans_doubts.php');
?>
