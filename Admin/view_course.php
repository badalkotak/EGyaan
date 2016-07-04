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
    <form action="show_attendence.php" method="post">
<?php
include("dbcon.php");
$br_uid=$_REQUEST['bruid'];
echo "<label>Select courses:</label><br>";
echo "<select name=menu1 onchange=showAttendence(this.value)>";
  echo '<option value="">Select Course..</option>';
              $i=0;
            $opt_c=mysqli_query($con,"Select * From Course where BatchId=$br_uid");
            while($crow=mysqli_fetch_array($opt_c))
            {
              $cname=$crow['CourseName'];
              $c_uid=$crow['CourseId'];

              echo "<option value=$c_uid>$cname</option>";
              $i=$i+1;
            }
?>
</select><br><br>

<button type="submit" class="btn btn-success">View Attendance</button>

</body>
</html>
