<?php
session_start();
include("../dbcon.php");
error_reporting(0);
echo $title=$_REQUEST['title'];
echo $t=urldecode($title);
echo $notice=$_REQUEST['notice'];

echo $uid=$_REQUEST['uid'];
error_reporting(0);

 //$uid=$_REQUEST['update'];
 $targetfolder = "../uploads/notices/";
 
 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
 
 $ok=1;
 $file_name=$_FILES['file']['name'];
 //echo "Filename=$file_name";
$file_type=$_FILES['file']['type'];
 
//if ($file_type=="application/pdf" || $file_type=="image/gif" || $file_type=="image/jpeg") {
 
 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
 
 {
$temp=mysqli_query($con,"SELECT * FROM `NoticeBoard` WHERE `NoticeId`='$uid'");
while($row = mysqli_fetch_array($temp))
{
	$orgFile=$row['NoticeFile'];
}
	$url="../uploads/notices/$file_name";

	$result=mysqli_query($con,"UPDATE `NoticeBoard` SET `NoticeTitle`='$t',`Notice`='$notice',`NoticeFile`='$url' WHERE NoticeId='$uid'");
}
else
{
		$result=mysqli_query($con,"UPDATE `NoticeBoard` SET `NoticeTitle`='$t',`Notice`='$notice' WHERE NoticeId='$uid'");
}

header('Location: ../view_notice.php?view='.$uid);
?>
