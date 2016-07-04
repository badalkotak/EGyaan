<?php
include("dbcon.php");

$result=mysqli_query($con,"Select * From Student_Login");
while($row=mysqli_fetch_array($result)){
	$json[]=$row;
}

echo json_encode($json);

?>