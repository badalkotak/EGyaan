<?php
include("../dbcon.php");
// error_reporting(0);
date_default_timezone_set("Asia/Calcutta");
$date=date('d/m/Y');
$title=$_REQUEST['title'];
$total=$_REQUEST['total'];
$course=$_REQUEST['cid'];
$dot=$_REQUEST['dot'];

$bname=mysqli_query($con,"SELECT BatchId FROM `Course` WHERE `CourseId`='$course'");
              while($brow=mysqli_fetch_array($bname))
              {
                $BatchId=$brow['BatchId'];
              }

              /*$c=mysqli_query($con,"SELECT COUNT(StudentId) FROM Student WHERE BatchId='$BatchId'");
              while($cr=mysqli_fetch_array($c))
              {
                $counts=$cr['COUNT(StudentId)'];
              }
              $counter=0;*/

		$insert_result=mysqli_query($con,"INSERT INTO `Result`(`BatchId`, `CourseId`, `ResultTitle`, `TotalMarks`, `DateOfUpload`, `DateOfTest`) VALUES ('$BatchId','$course','$title','$total','$date','$dot')");

$getResultId=mysqli_query($con,"SELECT * FROM `Result` WHERE `DateOfTest`='$dot' && `BatchId`='$BatchId' && `CourseId`='$course' && `ResultTitle`='$title'");

while($getRIDRow=mysqli_fetch_array($getResultId))
{
	echo $rid=$getRIDRow['ResultId'];
}
              $result=mysqli_query($con,"SELECT * FROM Student WHERE BatchId='$BatchId'");
              while($row=mysqli_fetch_array($result))
              {
              	$uid=$row['StudentId'];
              	$mks=$_REQUEST[$uid];
		if($mks!="")
		$insert_marks=mysqli_query($con,"INSERT INTO `StudentMarks`(`ResultId`, `StudentId`, `Marks`) VALUES ('$rid','$uid','$mks')");
		}
              	/*if($insert_mks=mysqli_query($con,"INSERT INTO `Marks`(`student`, `marks`, `uid`) VALUES ('$uid','$mks','$result_uid')"))
                {
                  $counter++;
                }
              }

              if($counter==$counts)
              {
              if($insert_result=mysqli_query($con,"INSERT INTO `result`(`branch`, `uid`, `title`, `total`, `DOU`, `DOT`) VALUES ('$br','$result_uid','$title','$total','$date','$dot')"))
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
}*/
            
header('Location:../result.php');

?>
