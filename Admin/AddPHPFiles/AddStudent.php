<?php
include("../dbcon.php");
error_reporting(0);
$amount=$_REQUEST['amount'];
$comment=$_REQUEST['comment'];
$fname=$_REQUEST['fname'];
$fname=trim($fname);
$fname=mysqli_real_escape_string($con,$fname);
$lname=$_REQUEST['lname'];
$lname=trim($lname);
$lname=mysqli_real_escape_string($con,$lname);
$student=$fname." ".$lname;
 $br_uid=$_REQUEST['menu1'];
 $pfname=$_REQUEST['pfname'];
 $pfname=trim($pfname);
 $pfname=mysqli_real_escape_string($con,$pfname);
 $mn=$_REQUEST['mn'];
 $pmn=$_REQUEST['pmn'];

 $pe=$_REQUEST['pe'];
 $pe=trim($pe);
 $gender=$_REQUEST['gender'];
 $date=date('d/m/Y');

$pass="";
 $se=$_REQUEST['se'];
 $se=trim($se);
function generatePassword($length = 4) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }
	
    return $result;
}
$Ppass=generatePassword();
$pass=generatePassword();

$e=mysqli_query($con,"SELECT * FROM Student");
while($row=mysqli_fetch_array($e))
{
    $pemail=$row['ParentEmail'];
    $semail=$row['StudentEmail'];
    if($pe==$pemail)
        echo "<script>alert('Parent with same email already exists! Try again with another email ID!');window.location.href='../Student.php';</script>";
    if($se==$semail)
        echo "<script>alert('Student with same email already exists! Try again with another email ID!');window.location.href='../Student.php';</script>";
}

$result1=mysqli_query($con,"SELECT * FROM `Batch` WHERE `BatchId`='$br_uid'");
while($row=mysqli_fetch_array($result1))
{
    $branch=$row['BatchName'];
}

if($fname!="" && $lname!="" && $pfname!="" && $mn!="" && $pe!="" && $se!="")
{
if($result = mysqli_query($con,"INSERT INTO `Student`(`StudentFname`, `StudentLname`, `BatchId`, `StudentEmail`, `StudentPasswd`, `StudentMobile`, `StudentGender`, `ParentName`, `ParentEmail`, `ParentPasswd`, `FeesPaid`, `FeesComment`, `DateOFAdmission`, `ParentMobile`) VALUES ('$fname','$lname','$br_uid','$se','$pass','$mn','$gender','$pfname','$pe','$Ppass','$amount','$comment','$date','$pmn')"))
{
    echo "<script>alert('Student successfully added to $branch!');window.location.href='../course_student.php?t=$br_uid&s=$student&e=$se'</script>";
}
else
{
    echo "<script>alert('Student was not added!');window.location.href='../Student.php';</script>";
}
}
else
{
    echo "<script>alert('Student was not added!');window.location.href='../Student.php';</script>";   
}



?>
