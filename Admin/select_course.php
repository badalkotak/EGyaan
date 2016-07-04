<?php
include("dbcon.php");
$br_uid=$_REQUEST['bruid'];
echo "<label>Select courses:<i>  Please reselect the registered courses, else the previous courses will be lost!</i></label><br>";
              $i=0;
            $opt_c=mysqli_query($con,"Select * From Course where BatchId=$br_uid");
            while($crow=mysqli_fetch_array($opt_c))
            {
              $cname=$crow['CourseName'];
              $c_uid=$crow['CourseId'];

              echo "<input type=checkbox name=$i value=$c_uid> $cname</input><br>";
              $i=$i+1;
            }
?>
