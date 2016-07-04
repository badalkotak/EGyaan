<?php
include("../dbcon.php");
error_reporting(0);

 //$uid=$_REQUEST['update'];
 $targetfolder = "../../uploads/notices/";
 
 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
 
 $ok=1;
 $file_name=$_FILES['file']['name'];
 
$file_type=$_FILES['file']['type'];
 
//if ($file_type=="application/pdf" || $file_type=="image/gif" || $file_type=="image/jpeg") {
$title=$_REQUEST["title"];
$title=trim($title);
$title=mysqli_real_escape_string($con,$title);
$notice=$_REQUEST["notice"];
$notice=trim($notice);
$notice=mysqli_real_escape_string($con,$notice);
$opt=$_REQUEST["optnotice"];
$urg=$_REQUEST['urgent'];
$br_uid=$_REQUEST['menu1'];

if($urg!="")
$urg="Y";
else
$urg="N";

if($opt=="common")
$type=0;
else
$type=$br_uid;

if($file_name!="")
$url="../uploads/notices/$file_name";
else
$url="";

if($title!="" && $notice!="" && $opt!="")
{
	// if($file_name!="")
	// {
 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
{	


/*if($opt=='branch')
{
	$result1=mysqli_query($con,"SELECT * FROM `Batch` WHERE `BatchId`='$br_uid'");
	while($row=mysqli_fetch_array($result1))
	{
		$branch=$row['BatchName'];
	}
	$opt=$branch;

}*/
if($result = mysqli_query($con,"INSERT INTO `NoticeBoard`( `NoticeTitle`, `Notice`, `NoticeFile`, `UrgentNotice`, `NoticeType`) VALUES ('$title','$notice','$url','$urg','$type')"))
{
	$getId=mysqli_query($con,"SELECT NoticeId FROM NoticeBoard WHERE NoticeTitle='$title' && NoticeType='$type' && UrgentNotice='$urg'");
	while($getrow=mysqli_fetch_array($getId))
	{
		$NoticeId=$getrow['NoticeId'];
	}
	echo "<script>alert('Notice Successfully added!');window.location.href='../view_notice.php?view=$NoticeId';</script>";
}
 /*else
 {
 	echo "<script>alert('Problem in adding Notice!');window.location.href='Notice.php';</script>";	
 }*/

 

 else
 {
 	echo "<script>alert('Please input all the * fields!');window.location.href='../Notice.php';</script>";	
 }
}
}
// else
//  {
//  	echo "<script>alert('Problem in adding Notice!');window.location.href='Read_Notice.php';</script>";	
//  } 
//  //}
// //}
//  else
//  {
//  	echo "<script>alert('Problem in adding Notice!');window.location.href='Read_Notice.php';</script>";	
//  }
?>
