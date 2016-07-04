<?php
session_start();
$user=$_SESSION['uname'];
if($user=="")
{
  header('Location: index.php');
}
$uid=$_REQUEST['edit'];
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Student</title>
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
    <style>
    #errmsg
{
color: red;
}
</style>
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
            <?php
            $bruid=$_REQUEST['bruid'];
            if($bruid!="")
            echo "<li><a href=VE_student.php?menu1=$bruid><i class='fa fa-share'></i> <span>View Student</span></a></li>";
            ?>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
              </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Student: 
          </h1>
          
        </section>
        <!-- Main content -->
        <section class="content">
          <?php

include("dbcon.php");
//error_reporting(0);
$result = mysqli_query($con,"SELECT * FROM Student WHERE StudentId='$uid'");
while($row = mysqli_fetch_array($result)) 
{
$fname=$row['StudentFname'];
$lname=$row['StudentLname'];
$pfname=$row['ParentName'];
$semail=$row['StudentEmail'];
$pemail=$row['ParentEmail'];
$mn=$row['StudentMobile'];
$pmn=$row['ParentMobile'];
$BatchId=$row['BatchId'];
//$s_uid=$row['uid'];

$gender=$row['StudentGender'];
}
          echo "<form action=EditPHPFiles/UpdateStudent.php?uid=$uid role=form method=post>";
          echo "<div class=form-group has-feedback>";
          echo "<label>Student Firstname:</label>";
            echo "<input type=text class=form-control placeholder='Student Firstname' name=fname value='$fname'>";
            echo "<span class='glyphicon glyphicon-user form-control-feedback'></span>";
          echo "</div>";
          echo "<div class=form-group has-feedback>";
          echo "<label>Student Lastname:</label>";
            echo "<input type=text class=form-control placeholder='Student Lastname' name=lname value=$lname>";
            echo "<span class=glyphicon glyphicon-user form-control-feedback></span>";
          echo "</div>";
          echo "<div class=form-group has-feedback>";
          echo "<label>Student Email:</label>";
            echo "<input type=email class=form-control placeholder='Student Email' name=se value=$semail>";
            echo "<span class=glyphicon glyphicon-envelope form-control-feedback></span>";
          echo "</div>";
          echo "<div class=form-group has-feedback>";
          echo "<label>Parent Firstname:</label>";
            echo "<input type=text class=form-control placeholder='Parent Firstname' name=pfname value=$pfname>";
            echo "<span class=glyphicon glyphicon-user form-control-feedback></span>";
          echo "</div>";
          echo "<div class=form-group has-feedback>";
          echo "<label>Parent Email:</label>";
            echo "<input type=email class=form-control placeholder='Parent Email' name=pe value=$pemail>";
            echo "<span class=glyphicon glyphicon-envelope form-control-feedback></span>";
          echo "</div>";
          echo "<div class=form-group has-feedback>";
          echo "<label>Mobile Number:</label>";
            echo "<input type=text class=form-control placeholder='Mobile Number' name=mn id=mn value=$mn>";
            echo "<span class=fa fa-th form-control-feedback></span>";
          echo "</div>";
	echo '<div class="form-group has-feedback">
		<label>Parent Mobile Number:</label>';
            echo "<input type='text' class='form-control' placeholder='Parent Mobile Number' name='pmn' id=pmn value='$pmn'>";
            echo '<span class="fa form-control-feedback"></span>
            <div id="perrmsg"></div>
          </div>';
//echo "<div class=form-group>";
//echo "<label>Address:</label><br>";
//echo "<textarea rows=5 id=comment class=ta5 name=addr placeholder=Address>$addr</textarea>";
//echo "</div>";
echo '<div class="form-group">
  <label for="gender">Select Gender:</label><br>
  <select name="gender">';
  if($gender=="M")
  {
    $g="Male";
   echo "<option value=$gender selected>$g</option>";
    echo "<option value=F>Female</option>";
  }
  else if($gender=="F")
  {
    $g="Female";
    echo "<option value=M>Male</option>";
    echo "<option value=$gender selected>$g</option>";
  }
  echo '</select><br><br>';
echo "<div class=form-group>";
echo "<label for=menu1>Select Branch:</label><br>";?>
<select class="tb5" name="menu1" onchange="showCourse(this.value)">
<?php
include("dbcon.php");
$result = mysqli_query($con,"SELECT * FROM `Batch`");
while($row = mysqli_fetch_array($result))
{
$name=$row['BatchName'];
$buid=$row['BatchId'];

if($buid==$BatchId)
{
$SelectedBatchId=$BatchId;
echo "<option value=$buid selected>$name</option>";
}
else
{
echo "<option value=$buid>$name</option>"; 
}
}
echo "</select><br><br>";
echo "<label> Current Branch:$name</label><br></div>";

        
            
            echo "<label>Registered courses:</label> ";
            $check=mysqli_query($con,"SELECT * FROM `StudentCourseRegistration` WHERE `StudentId`='$uid'");
              while($check_row=mysqli_fetch_array($check))
              {
                $cuid=$check_row['CourseId'];
                $r=mysqli_query($con,"SELECT * FROM `Course` WHERE `CourseId`='$cuid'");
            
            while($crow=mysqli_fetch_array($r))
            {
              $cname=$crow['CourseName'];
              echo "|$cname| ";
            }
          }echo "<br>";

          echo "<div id=txtHint>";
          echo "<label>Select courses:<i>  Please reselect the registered courses, else the previous courses will be lost!</i></label><br>";
              $i=0;
            $opt_c=mysqli_query($con,"Select * From Course where BatchId=$buid");
            while($crow=mysqli_fetch_array($opt_c))
            {
              $cname=$crow['CourseName'];
              $c_uid=$crow['CourseId'];

              echo "<input type=checkbox name=$i value=$c_uid> $cname</input><br>";
              $i=$i+1;
            }

          echo "</div>";
            
echo "<br><button type=submit class=btn btn-success value=$i name=t>Update</button>";
?>
</form>
<a href="VE_student.php"><button type=submit class=btn btn-success value=$i name=t>Cancel</button></a>
</div>


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
    $(document).ready(function () {
  //called when key is pressed in textbox
  $("#mn").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

    function showCourse(str) {
  var xhttp;    
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("txtHint").innerHTML = xhttp.responseText;
    }
  }
  xhttp.open("GET", "select_course.php?bruid="+str, true);
  xhttp.send();
}

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#pmn").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#perrmsg").html("Digits Only").show().fadeOut("slow");
               return false;
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
