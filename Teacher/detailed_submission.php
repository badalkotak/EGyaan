<?php
session_start();
$user=$_SESSION['uname'];
if($user=="")
{
  header('Location: index.php');
}
if($user=="")
{
  header('Location: index.php');
}
include("dbcon.php");
                  $u=mysqli_query($con,"Select * From Teacher_Login where email='$user'");
                  while($row= mysqli_fetch_array($u))
                  {
                    $usr=$row['username'];
                    $branch=$row['branch'];
                  }
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Assignment</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../AdminLTE/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../AdminLTE/dist/css/AdminLTE.min.css">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="../AdminLTE/dist/css/skins/skin-yellow-light.min.css">

    <style type="text/css">
/**
 * Override feedback icon position
 * See http://formvalidation.io/examples/adjusting-feedback-icon-position/
 */
#eventForm .form-control-feedback {
    top: 0;
    right: -15px;
}
</style>

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
        <a href="TeacherDashboard.php" class="logo">
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
                  <img src="D_Logo/avatar5.png" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $usr ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="D_Logo/avatar5.png" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $usr;
                      echo "<br>";
                  $c=mysqli_query($con,"Select * From course_teacher where email='$user'");
                  echo "Course: ";
                  while($row=mysqli_fetch_array($c))
                  {
                    
                    $course=$row['course'];
                    $course=$row['course'];
                    $get_name=mysqli_query($con,"SELECT courses FROM courses WHERE id='$course'");
                    while($c_row=mysqli_fetch_array($get_name))
                    {
                      $course=$c_row['courses']; 
                    }
                    echo "|$course| ";
                  }
                  ?>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <!-- <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div> -->
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
              <img src="D_Logo/avatar5.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $usr?></p>
              <!-- Status -->
            </div>
          </div>

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <!-- Optionally, you can add icons to the links -->
            <li><a href="TeacherDashboard.php"><i class="fa fa-home"></i><span>Home</span></a></li>
            <li><a href="settings.php"><i class="fa fa-gears"></i> <span>Settings</span></a></li>
            <li><a href="submission.php"><i class="fa fa-share"></i> <span>All Submissions</span></a></li>

          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
              </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Assignment:
          </h1>
          
        </section>
        <!-- Main content -->
        <section class="content">

          <?php
          $c_uid=$_REQUEST['detail'];
           error_reporting(0);
echo "<div class=table-responsive>";
echo "<table class=table table-striped>";
echo "<thead>";
echo "<tr>";
echo "<th>Sr No.</th>";
echo "<th>Student Name</th>";
echo "<th>UID</th>";
echo "<th>Submitted</th>";
echo "<th>View</th>";
echo "<th>Delete File</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
$i=0;
include("dbcon.php");
$branch=mysqli_query($con,"SELECT * FROM Teacher_Login WHERE email='$user'");
while($br_arr=mysqli_fetch_array($branch))
{
  $br=$br_arr['branch'];
}

$result = mysqli_query($con,"SELECT * FROM Student_Login WHERE branch='$br'");
while($row = mysqli_fetch_array($result))
{
$stud_fname=$row['fname'];
$stud_lname=$row['lname'];
$stud_name=$stud_fname." ".$stud_lname;
$stud_uid=$row['uid'];

$i++;
echo "<tr>";
echo "<td>";
echo $i;
echo "</td>";
echo "<td>";
echo $stud_name;
echo "</td>";
echo "<td>";
echo $stud_uid;
echo "</td>";

if($report = mysqli_query($con,"SELECT * FROM `submission_report` WHERE `uid`='$c_uid' AND `stud_uid`='$stud_uid'"))
{

if(!$r=mysqli_fetch_array($report))

{

  
  echo "<td>";
    echo "NO";
    echo "</td>";
echo "<td>";
echo "No File";
echo "</td>";
echo "<td>";
echo "--";
echo "</td>";
}
else
{
  $report = mysqli_query($con,"SELECT * FROM `submission_report` WHERE `uid`='$c_uid' AND `stud_uid`='$stud_uid'");
  
  
while($report_arr=mysqli_fetch_array($report))  
{
  
  $path=$report_arr['path'];
  $stud_report_uid=$report_arr['stud_uid'];
    echo "<td>";
    echo "YES";
    echo "</td>";
echo "<td>";
echo "<a href=$path>View</a>";
echo "</td>";
echo "<td>";
echo "<form action=del_sr.php?s=$c_uid method=post><button type=submit class=btn btn-default name=del value='$stud_report_uid' disabled>Delete</button></form>";
echo "</td>";
  }
}
}
echo "</td>";
echo "</tr>";
}
echo "</tbody>";
echo "</table>";
?>

          <!-- /.box -->
            </div>
           <!--  <form id="eventForm" method="post" class="form-horizontal" action="add_submission.php">
    <div class="form-group">
        <label class="col-xs-3 control-label">Event</label>
        <div class="col-xs-5">
            <input type="text" class="form-control" name="name" />
        </div>
    </div>
 -->

    <!-- <div class="form-group">
        <div class="col-xs-5 col-xs-offset-3">
            <button type="submit" class="btn btn-default">Validate</button>
        </div>
    </div>
</form> -->
        </section>
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

    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>


  <script>
  function myFunction() {
    var x;
    if (confirm("Do you want to continue") == true) {
        
    } else {
        event.preventDefault() ;
        
    }
    //document.getElementById("demo").innerHTML = x;
}
$(document).ready(function() {
    $('#datePicker')
        .datepicker({
            format: 'mm/dd/yyyy'
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#eventForm').formValidation('revalidateField', 'date');
        });

    $('#eventForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required'
                    }
                }
            },
            date: {
                validators: {
                    notEmpty: {
                        message: 'The date is required'
                    },
                    date: {
                        format: 'MM/DD/YYYY',
                        message: 'The date is not a valid'
                    }
                }
            }
        }
    });
});
</script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
  </body>
</html>
