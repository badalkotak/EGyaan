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
    <title>Notes</title>
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
              
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="D_Logo/avatar4.png" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">            <?php 
                  include("dbcon.php");


                  $u=mysqli_query($con,"Select * From Student where StudentEmail='$user'");

                  while($row= mysqli_fetch_array($u))
                  {
                    $usr=$row['StudentFname']." ".$row['StudentLname'];
                    $br=$row['BatchId'];
                    $g=$row['StudentGender'];
		    $StudentId=$row['StudentId'];
                  }
                  if($g=="M")
                  {
                    $img="D_logo/avatar4.png";
                  }
                  else
                  {
                    $img="D_logo/avatar2.png";
                  }
                  $batchname=mysqli_query($con,"Select * from Batch where BatchId='$br'");
                  while($val=mysqli_fetch_array($batchname))
                  {
                    $bn=$val['BatchName'];
                  }
echo "<b>$usr</b>";
                  ?>
                  </span>
                </a>

                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="D_Logo/avatar4.png" class="img-circle" alt="User Image">
                    <p>
                  <?php 
                  echo $usr;
                  echo "<br>";
                  echo "Batch: $bn";
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
            Notes:
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <?php
          include("dbcon.php");
          //$br_uid=$_REQUEST['menu1'];
$count=0;
$check=mysqli_query($con,"SELECT CourseId FROM `StudentCourseRegistration` where `StudentId`='$StudentId'");
while($c_row=mysqli_fetch_array($check))
{
  $cid=$c_row['CourseId'];
  if($checknotes=mysqli_query($con,"Select NoteId From Notes Where CourseId='$cid'"))
  {
	$count++;
  }
}

// $result1=mysqli_query($con,"Select * From branch where uid='$br_uid'");
// while($row=mysqli_fetch_array($result1))
// {
//   $br=$row['branch'];
// }

if($count==0)
{
  echo "<h3><strong>No Notes Added Yet!</strong><br><br></h3>";
}
else
{
  ?>
<div class=table-responsive>        
<table class=table table-striped>
<thead>
<tr>
<th>Sr No.</th>
<th>Course</th>
<th>Notes</th>
</tr>
</thead>
<tbody>
<?php
include("dbcon.php");
error_reporting(0);
$i=0;
$result1 = mysqli_query($con,"SELECT * FROM `StudentCourseRegistration` WHERE `StudentId`='$StudentId'");
          while($row = mysqli_fetch_array($result1))
    {
    $cuid=$row['CourseId'];
    $get_name=mysqli_query($con,"SELECT CourseName FROM Course WHERE CourseId='$cuid'");
                    while($c_row=mysqli_fetch_array($get_name))
                    {
                      $c=$c_row['CourseName']; 
                    }

$result = mysqli_query($con,"SELECT * FROM `Notes` WHERE `CourseId`='$cuid'");
while($row = mysqli_fetch_array($result))
{
$path=$row['NoteFile'];
$i++;
echo "<tr>";
echo "<td>";
echo $i;
echo "</td>";
echo "<td>";
echo $c;
echo "</td>";
echo "<td>";
echo "<a href=$path>Open Notes</a>";
echo "</td>";
echo "</tr>";
}
}
?>
</tbody>
</table>
<? } ?>
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
