<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Timetable</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../AdminLTE/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../AdminLTE/dist/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../AdminLTE/dist/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../AdminLTE/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="AdminLTE/dist/css/skins/skin-yellow-light.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th>Sr No.</th>
<th>Student Name</th>

<?php
include("dbcon.php");
$d=$_REQUEST['date'];
echo "<th>$d</th>";
$i=0;
$flag=0;
// $dates = array();

// $count=0;
// $result=mysqli_query($con,"SELECT DISTINCT date FROM Attendence WHERE course_uid='$cuid' ORDER BY(date) DESC");
// while($row=mysqli_fetch_array($result))
// {
//   $date=$row['date'];
//   if($count<=6)
//   {
//   array_push($dates, $date);
//   echo "<th>$date</th>";$count++;
// }
// }
echo "</thead><tbody>";
$cuid=$_REQUEST['cuid'];
$suid=$_REQUEST['suid'];
// $l=sizeof($dates);
$student_uid=array();
$result1=mysqli_query($con,"SELECT DISTINCT StudentId FROM Attendance WHERE StudentId='$suid'");
while($row1=mysqli_fetch_array($result1))
{
 $suid=$row1['StudentId']."<br>";
 array_push($student_uid, $suid);
}

$sl=sizeof($student_uid);
for($j=0;$j<$sl;$j++)
{
  $i++;
$s_uid=$student_uid[$j];
 $sname=mysqli_query($con,"SELECT * FROM Student WHERE StudentId='$s_uid'");
 while($srow=mysqli_fetch_array($sname))
 {
  
  $fname=$srow['StudentFname'];
  $lname=$srow['StudentLname'];
  $name=$fname." ".$lname;
 }
 echo "<tr>";
 echo "<td>";
 echo $i;
 echo "</td>";
 echo "<td>";
 echo $name;
 echo "</td>";
 
  
  $result2=mysqli_query($con,"SELECT * FROM Attendance WHERE StudentId='$s_uid' && `Dates`='$d' && CourseId='$cuid'");
while($row2=mysqli_fetch_array($result2))
{
  $status=$row2['Attendance'];
  echo "<td>";
 echo $status;
 echo "</td>";  
}
 

 echo "</tr>";
}



?>
</tbody>
</table></div>
        
        <script src="AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="AdminLTE/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="AdminLTE/dist/js/app.min.js"></script>

    <script>

</script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
  </body>
</html>
