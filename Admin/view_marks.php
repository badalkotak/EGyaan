<?php
include("dbcon.php");
session_start();
$user=$_SESSION['uname'];
//error_reporting(0);
$r_uid=$_REQUEST['uid'];
if($user=="")
{
  header('Location: index.php');
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Results</title>
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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
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
        <a href="AdminDashboard.php" class="logo">
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
                  <img src="D_Logo/avatar.png" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">Admin</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="D_Logo/avatar.png" class="img-circle" alt="User Image">
                    <p>
                      Admin
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
              <img src="D_Logo/avatar.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Admin</p>
              <!-- Status -->
            </div>
          </div>

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <!-- Optionally, you can add icons to the links -->
            <li><a href="AdminDashboard.php"><i class="fa fa-home"></i><span>Home</span></a></li>
            <li><a href="settings.php"><i class="fa fa-gears"></i> <span>Settings</span></a></li>
            <li><a href="result.php"><i class="fa fa-share"></i> <span>List of all Results</span></a></li>
            <? echo "<li><a href=pdf/marks_pdf.php?uid=$r_uid><i class='fa fa-files-o'></i> <span>Generate PDF</span></a></li>"; ?>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
              </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Results:
          </h1>
          
        </section>
        <!-- Main content -->
        <section class="content">
<?php

            echo '<div class=table-responsive>        
<table class=table table-striped>
<thead>
<tr>
<th>Sr No.</th>
<th>Name</th>
<th>Marks</th>
</tr>
</thead>
<tbody>';
$sid_array=array();
error_reporting(0);
$i=0;
//$titl=urlencode($b);
$r=mysqli_query($con,"SELECT TotalMarks, BatchId, CourseId FROM Result WHERE ResultId='$r_uid'");
while($rrow=mysqli_fetch_array($r))
{
  $total=$rrow['TotalMarks'];
  $BatchId=$rrow['BatchId'];
  $CourseId=$rrow['CourseId'];
}

$studid=mysqli_query($con,"SELECT StudentId FROM StudentMarks WHERE ResultId='$r_uid'");
while($sidrow=mysqli_fetch_array($studid))
{
  $s_id=$sidrow['StudentId'];
array_push($sid_array,$s_id);//all students who appeared for the exam
}

$len=sizeOf($sid_array);
$getStud=mysqli_query($con,"SELECT DISTINCT(StudentId) FROM StudentCourseRegistration WHERE CourseId='$CourseId'");
while($getStudRow=mysqli_fetch_array($getStud))
{$i++;

$StudentId=$getStudRow['StudentId'];
$getStudentId=mysqli_query($con,"SELECT `StudentFname`, `StudentLname` FROM `Student` WHERE StudentId='$StudentId' ");
while($getRow=mysqli_fetch_array($getStudentId))
{

	$StudentName=$getRow['StudentFname']." ".$getRow['StudentLname'];

}

for($k=0;$k<$len;$k++)
{
if($sid_array[$k]==$StudentId)
{
$flag++;
}
else
{
$flag--;
}
}

if($flag>0)
{
$mark=mysqli_query($con,"SELECT * FROM StudentMarks WHERE ResultId='$r_uid' && StudentId='$StudentId'");
while($mrow=mysqli_fetch_array($mark))
{
$mks=$mrow['Marks'];
echo "<tr>";
              echo "<td>";
              echo $i;
              echo "</td>";
              
              echo "<td>";
              echo $StudentName;
              echo "</td>";
              echo "<td>";
              echo $mks;
              echo "</td>";
              echo "</tr>";
}
}
else
{
$mks="Absent";
echo "<tr>";
              echo "<td>";
              echo $i;
              echo "</td>";
              
              echo "<td>";
              echo $StudentName;
              echo "</td>";
              echo "<td>";
              echo $mks;
              echo "</td>";
              echo "</tr>";
}
}




















/*var_dump($sid_array);
$len=sizeOf($sid_array);

$mark=mysqli_query($con,"SELECT * FROM StudentMarks WHERE ResultId='$r_uid'");
while($mrow=mysqli_fetch_array($mark))
{
$mks=$mrow['Marks'];
$i++;
$s_uid=$mrow['StudentId'];
$flag=0;

$getStudentId=mysqli_query($con,"SELECT `StudentFname`, `StudentLname`, `StudentId` FROM `Student` ");
while($getRow=mysqli_fetch_array($getStudentId))
{

	$StudentName=$getRow['StudentFname']." ".$getRow['StudentLname'];
echo "sid:".$sid=$getRow['StudentId'];

for($k=0;$k<$len;$k++)
{
if($sid_array[$k]==$sid)
{
$flag++;break;
}
}
echo $flag."<br>";
echo $k;
if($flag==1)
{
	$mks=$mks."/".$total;
echo "<tr>";
              echo "<td>";
              echo $i;
              echo "</td>";
              
              echo "<td>";
              echo $StudentName;
              echo "</td>";
              echo "<td>";
              echo $mks;
              echo "</td>";
              echo "</tr>";
}
else if($flag!=1 && flag!=0)
{
$mks="Absent";
echo "<tr>";
              echo "<td>";
              echo $i;
              echo "</td>";
              
              echo "<td>";
              echo $StudentName;
              echo "</td>";
              echo "<td>";
              echo $mks;
              echo "</td>";
              echo "</tr>";
}
/*$mks=$mks."/".$total;
echo "<tr>";
              echo "<td>";
              echo $i;
              echo "</td>";
              
              echo "<td>";
              echo $StudentName;
              echo "</td>";
              echo "<td>";
              echo $mks;
              echo "</td>";
              echo "</tr>";*/
/*}
else
{
$mks="Ab";
echo "<tr>";
              echo "<td>";
              echo $i;
              echo "</td>";
              
              echo "<td>";
              echo $StudentName;
              echo "</td>";
              echo "<td>";
              echo $mks;
              echo "</td>";
              echo "</tr>";
}
//$flag++;break;


if($flag==1)
{
$mks=$mks."/".$total;
	echo "<tr>";
              echo "<td>";
              echo $i;
              echo "</td>";
              
              echo "<td>";
              echo $StudentName;
              echo "</td>";
              echo "<td>";
              echo $mks;
              echo "</td>";
              echo "</tr>";
}
else
{
//array_push($sid_array,$sid);
	/*echo "<tr>";
              echo "<td>";
              echo $i;
              echo "</td>";
              
              echo "<td>";
              echo $StudentName;
              echo "</td>";
              echo "<td>";
              echo $mks;
              echo "</td>";
              echo "</tr>";

}

              
}
}*/

echo '</tbody>
</table>
</div>';
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

    <script>
function del_confirm() {
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
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
  </body>
</html>
