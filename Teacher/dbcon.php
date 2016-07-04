<?php
// Database connectivity 
// DB name:EGyaan
// password:root(you possible might not have a password set, so set the 3rd parameter empty
$con=mysqli_connect("localhost","root","root","EGyaan");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//error_reporting(0);
?>
