<?php
include("../dbcon.php");
error_reporting(0);

echo $fees=$_REQUEST['fees'];
echo $suid=$_REQUEST['uid'];

if($fees!="")
{
	$get=mysqli_query($con,"SELECT FeesPaid FROM Student WHERE StudentId='$suid'");
	while($row=mysqli_fetch_array($get))
	{
		$paid_amt=$row['FeesPaid'];
	}

	$new_fees=$paid_amt+$fees;

	if($update=mysqli_query($con,"UPDATE `Student` SET `FeesPaid`='$new_fees' WHERE StudentId='$suid'"))
	{
		echo "<script>alert('Fees updated Successfully!');window.location.href='fees.php';</script>";
	}

	header('Location: ../fees.php');
}
else
{
	echo "<script>alert('Input the fees!');window.location.href='fees.php';</script>";
}
?>
