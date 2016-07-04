<?php
 //$uid=$_REQUEST['update'];
 echo $targetfolder = "uploads/notices/";
 session_start();
 echo $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
 echo $uid1=$_SESSION['uname'];

 $ok=1;
 $file_name=$_FILES['file']['name'];
$file_type=$_FILES['file']['type'];
 
if ($file_type=="application/pdf" || $file_type=="image/gif" || $file_type=="image/jpeg") {
 
 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
 
 {
 
 echo "The file ". basename( $_FILES['file']['name']). " is uploaded";
 include("dbcon.php");
 error_reporting(0);
 echo $file_name= basename( $_FILES['file']['name']);
 //$result = mysqli_query($con,"UPDATE `notices` SET `file`= WHERE  WHERE `uid`='$uid'");
 //header('Location: sub_category.php');
 }
 
 else {
 
 echo "Problem uploading file";
 
 }
 
}
 
else {
 
 echo "You may only upload PDFs, JPEGs or GIF files.<br>";
 
}
 
?>