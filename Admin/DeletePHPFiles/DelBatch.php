<?php
include("../dbcon.php");
error_reporting(0);

$BatchId=$_REQUEST["del"];

$result1=mysqli_query($con,"DELETE FROM `Batch` WHERE `Batchid`='$BatchId'");

header('Location: ../Batch.php');
?>
