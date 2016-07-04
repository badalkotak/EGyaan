<?php
session_start();
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
    <title>Submissions</title>
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
    <link rel="stylesheet" href="../AdminLTE/dist/css/skins/skin-yellow-light.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="hold-transition skin-yellow-light sidebar-mini">
    <div class="wrapper">
      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img class="img-responsive" src="D_Logo/E.jpg" width=35 height=60 /></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><img class="img-responsive" src="D_Logo/Logo.png" height=50 width=130/></b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <?php 
                  include("dbcon.php");
                  $u=mysqli_query($con,"Select * From Student where StudentEmail='$user'");
                  while($row= mysqli_fetch_array($u))
                  {
                    $usr=$row['StudentFname']." ".$row['StudentLname'];
                    $bruid=$row['BatchId'];
		    $StudentId=$row['StudentId'];
		    $getBatchName=mysqli_query($con,"SELECT BatchName FROM Batch WHERE BatchId='$bruid'");
			while($batchrow=mysqli_fetch_array($getBatchName))
			{
				$br=$batchrow['BatchName'];
			}	
                    $g=$row['StudentGender'];
                  }
                  if($g=="M")
                  {
                    $img="D_logo/avatar4.png";
                  }
                  else
                  {
                    $img="D_logo/avatar2.png";
                  }
                  
                  ?>
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src=<? echo $img;?> class="user-image" alt="User Image"><strong><?echo $usr;?></strong>
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src=<? echo $img;?> class="img-circle" alt="User Image">
                    <p>
                  <?php 
                  echo $usr;
                  echo "<br>";
                  echo "Batch: $br";
                  ?>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="view_student.php" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src=<? echo $img;?> class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><a href="view_student.php"><?php echo $usr;?></a></p>
              <!-- Status -->
            </div>
          </div>
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
  
            <!-- Optionally, you can add icons to the links -->
            <li><a href="StudentDashboard.php"><i class="fa fa-home"></i><span>Home</span></a></li>
            <li><a href="settings.php"><i class="fa fa-gears"></i> <span>Settings</span></a></li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
              </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Submissions
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <?php
          //$uid=$_REQUEST['branch'];

$result1 = mysqli_query($con,"SELECT * FROM `StudentCourseRegistration` WHERE `StudentId`='$StudentId'");
          while($row = mysqli_fetch_array($result1))
    {
    $cuid=$row['CourseId'];

$check=mysqli_query($con,"SELECT COUNT(SubmissionId) FROM `Submission` where `CourseId`='$cuid'");
while($c_row=mysqli_fetch_array($check))
{
  $count=$c_row['COUNT(SubmissionId)'];
}
}
if($count==0)
{
  echo "<h3><strong>No submission Added Yet!</strong><br><br></h3>";
}
else
{
           error_reporting(0);
echo "<div class=table-responsive>";
echo "<table class=table table-striped>";
echo "<thead>";
echo "<tr>";
echo "<th>Sr No.</th>";
echo "<th>Title</th>";
echo "<th>Course</th>";
echo "<th>Date of Upload</th>";
echo "<th>Date of Submission</th>";
echo "<th>View</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
$i=0;
include("dbcon.php");

$result1 = mysqli_query($con,"SELECT * FROM `StudentCourseRegistration` WHERE `StudentId`='$StudentId'");
          while($row = mysqli_fetch_array($result1))
    {
    $cuid=$row['CourseId'];
$cname=mysqli_query($con,"SELECT CourseName FROM Course WHERE CourseId='$cuid'");
while($crow=mysqli_fetch_array($cname))
{
	$course=$crow['CourseName'];
}
$result = mysqli_query($con,"SELECT * FROM `Submission` WHERE `CourseId`='$cuid' ORDER BY(DateOfSubmission) ASC");
while($row = mysqli_fetch_array($result))
{
$dou=$row['DateOfUpload'];
$dos=$row['DateOfSubmission'];
$uid=$row['SubmissionId'];
$title=$row['SubmissionTitle'];

$path=$row['SubmissionFile'];
$course_name=mysqli_query($con,"SELECT * FROM `Course` WHERE `CourseId`='$c_uid'");
while($row1=mysqli_fetch_array($course_name))
{
  $course=$row1['CourseName'];
  $co_uid=$row1['CourseId'];
}
$i++;
echo "<tr>";
echo "<td>";
echo $i;
echo "</td>";
echo "<td>";
echo $title;
echo "</td>";
echo "<td>";
echo $course;
echo "</td>";
echo "<td>";
echo $dou;
echo "</td>";
echo "<td>";
echo $dos;
echo "</td>";
echo "<td>";
echo "<a href=$path>View</a>";
echo "</td>";
/*echo "<td>";
$flag=0;
$check = mysqli_query($con,"SELECT * FROM `submission_report` WHERE `uid`='$uid'");
while($crow=mysqli_fetch_array($check))
{
  $s_uid=$crow['stud_uid'];
  $s_path=$crow['path'];
  if($s_uid==$stud_uid)
  {
    $flag=1;
  }
}
echo '<div class="col-md-10">
              <div class="box box-default collapsed-box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Answers</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">';
echo "<form action=upload_answers.php method=post enctype=multipart/form-data>";
echo "<input type=file name=file enctype=multipart/form-data/><br>";
if($dos<date('m/d/Y') && $flag==0)
echo "You are late";
else if($flag==1)
  echo "Submission done: <a href=$path>View</a>";
else
echo "<button type=submit class=btn btn-default name=upload value='$uid' disabled>Upload</button></form>";
echo '</div>
            </div>';
echo "</td>";*/
echo "</tr>";
}
}
echo "</tbody>";
echo "</table>";

}
?>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          <i>Using Technology For Learning</i>
        </div>
        <!-- Default to the left -->
        <strong>EGyaan</strong>
      </footer>
      <!-- Control Sidebar -->
        <!-- Tab panes -->
    <!-- REQUIRED JS SCRIPTS -->
    <!-- jQuery 2.1.4 -->
    <script src="../AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../AdminLTE/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../AdminLTE/dist/js/app.min.js"></script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
  </body>
</html>
