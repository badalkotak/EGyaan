<?php
session_start();
error_reporting(0);
$user=$_SESSION['uname'];
if($user=="")
{
  header('Location: index.php');
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>View Attendence</title>
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
    <?php
    $se=$_REQUEST['se'];
    echo "<form action=view_stud_att.php?se=$se method=post>";

include("dbcon.php");

echo "<label>Select courses:</label><br>";
echo "<select name=menu1 onchange=showAttendence(this.value)>";
  echo '<option value="">Select Course..</option>';
              $i=0;
            $opt_c=mysqli_query($con,"Select * From StudentCourseRegistration where StudentId='$se'");
            while($crow=mysqli_fetch_array($opt_c))
            {
              $c_uid=$crow['CourseId'];
              $c=mysqli_query($con,"Select CourseName From Course where CourseId='$c_uid'");
              while($course_row=mysqli_fetch_array($c))
              {
              $cname=$course_row['CourseName'];
              }

              echo "<option value=$c_uid>$cname</option>";
              $i=$i+1;
            }
?>
</select><br><br>

<!-- <div id="table"></div> -->

<button type="submit" class="btn btn-success">View Attendance</button>

</body>
</html>
