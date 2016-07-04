﻿<?php
include("../dbcon.php");
error_reporting(0);

$c1=$_REQUEST['Batch'];
$Batch=mysqli_real_escape_string($con,$c1);

$flag=0;
$batch_check=mysqli_query($con,"Select * From Batch");
while($row=mysqli_fetch_array($batch_check))
{
    $br=$row['BatchName'];
    if($Batch==$br)
    {
        echo "<script>alert('Batch with this name already exists!');window.location.href='Batch.php';</script>";
        $flag++;
    }
}
if($Batch!=null && $flag==0)
{
if($result = mysqli_query($con,"INSERT INTO `Batch`(`BatchName`) VALUES ('$Batch')"))
{
	echo "<script>alert('Branch Successfully added!');window.location.href='../Batch.php';</script>";
}
else
{
	echo "<script>alert('Branch was not added!');window.location.href='../Batch.php';</script>";
}
}
else
{
	echo "<script>alert('Branch was not added!');window.location.href='../Batch.php';</script>";
}
?>
