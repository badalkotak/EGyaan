<?php
include("dbcon.php");
session_start();
$user=$_SESSION['uname'];
error_reporting(0);
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
          include("dbcon.php");
          $result1 = mysqli_query($con,"SELECT COUNT(ResultId) FROM `Result`");
          while($row1 = mysqli_fetch_array($result1))
          {
            $count=$row1['COUNT(ResultId)'];
          }
          if($count==0)
          {
            echo "<h3><strong>No Results Added Yet!</strong><br><br></h3>";
          }
          else
          {
          echo '<div class=table-responsive>        
<table class=table table-striped>
<thead>
<tr>
<th>Sr No.</th>
<th>Date of Test</th>
<th>Date of Upload</th>
<th>Batch</th>
<th>Course</th>
<th>Title</th>
<th>Result</th>
<th>Delete</th>
</tr>
</thead>
<tbody>';

error_reporting(0);
$i=0;
$result = mysqli_query($con,"SELECT * FROM Result");
while($row = mysqli_fetch_array($result))
{
$bid=$row['BatchId'];
$courseId=$row['CourseId'];
$result1 = mysqli_query($con,"SELECT * FROM Batch WHERE BatchId='$bid'");
while($row1 = mysqli_fetch_array($result1))
{
$bname=$row1['BatchName'];
}
$result2 = mysqli_query($con,"SELECT * FROM Course WHERE CourseId='$courseId'");
while($row2 = mysqli_fetch_array($result2))
{
$cname=$row2['CourseName'];
}

//$br=urlencode($b);
$r_uid=$row['ResultId'];
$dot=$row['DateOfTest'];
$dou=$row['DateOfUpload'];
$t=$row['ResultTitle'];
$i++;
echo "<tr>";
echo "<td>";
echo $i;
echo "</td>";
echo "<td>";
echo $dot;
echo "</td>";
echo "<td>";
echo $dou;
echo "</td>";
echo "<td>";
echo $bname;
echo "</td>";
echo "<td>";
echo $cname;
echo "</td>";
echo "<td>";
echo $t;
echo "</td>";
echo "<td>";
echo "<a href=view_marks.php?uid=$r_uid>Open Result</a>";
echo "</td>";
echo "<td>";
echo "<form action=DeletePHPFiles/DeleteResult.php method=post><button type=submit class=btn btn-default name=del value=$r_uid onclick=del_confirm() >Delete</button></form>";
echo "</td>";
echo "</tr>";

}
echo '</tbody>
</table>
</div>';
}
?>

         <div class="col-md-6">
              <div class="box box-default collapsed-box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Result</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form action="AddPHPFiles/AddMarks.php" role="form" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="menu1">Select Course:</label>
<select class="tb5" name="menu1">
<?php
//$b=$_REQUEST['menu1'];
$result = mysqli_query($con,"SELECT * FROM `Course`");
while($row = mysqli_fetch_array($result))
{
$name=$row['CourseName'];
$c_uid=$row['CourseId'];
$BatchId=$row['BatchId'];

$result1 = mysqli_query($con,"SELECT * FROM Batch WHERE BatchId='$BatchId'");
while($row1 = mysqli_fetch_array($result1))
{
$bname=$row1['BatchName'];
//echo "<option value=$uid>$name</option>";
}
echo "<option value=$c_uid>$name- $bname</option>";
}
?>
</select><br>
</div>
<div class="form-group has-feedback">
<label for="course">Test Title:</label>
            <input type="text" class="form-control" placeholder="Test Title" name="title">
            
</div>

<div class="form-group has-feedback">
<label for="course">Total Marks:</label>
            <input type="text" class="form-control" placeholder="Total Marks" name="marks" id="mks">
            
</div>
<div id="errmsg"></div>

<div class="form-group">
        <label class="col-xs-12 control-label">Date of Exam:</label>
        <!-- <div class="col-xs-5 date"> -->
            <div class="input-group input-append date" id="datePicker">
                <input type="text" class="form-control" name="dot" />
                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        <!-- </div> -->
    </div>
<button type="submit" class="btn btn-success">Next</button>
                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><br><br><br><!-- /.col -->
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

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#mks").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

$(document).ready(function() {
    $('#datePicker')
        .datepicker({
            format: 'dd/mm/yyyy'
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
