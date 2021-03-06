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
    <title>ParentDashboard</title>
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
                  <img src="D_Logo/parent.jpeg" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php 
                  include("dbcon.php");
                  $u=mysqli_query($con,"Select * From Student where ParentEmail='$user'");
                  while($row= mysqli_fetch_array($u))
                  {
			$StudentId=$row['StudentId'];
                    $usr=$row['ParentName']." ".$row['StudentLname'];
                    $b_uid=$row['BatchId'];
		    /*$getBatchName=mysqli_query($con,"SELECT BatchName FROM Batch WHERE BatchId='$brid'");
			while($batchrow=mysqli_fetch_array($getBatchName))
			{
				$brid=$batchrow['BatchName'];
			}*/
                    $stud_usr=$row['StudentFname']." ".$row['StudentLname'];
                  }
                  echo $usr;
                  ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="D_Logo/parent.jpeg" class="img-circle" alt="User Image">
                    <p>
                  <?php 
                  echo $usr;
                  echo "<br>";
                  echo "Student: $stud_usr";
                  ?>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <!-- <a href="view_student.php" class="btn btn-default btn-flat">Profile</a> -->
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
              <img src="D_Logo/parent.jpeg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $usr;?></p>
              <!-- Status -->
            </div>
          </div>
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="ParentDashboard.php"><i class="fa fa-home"></i><span>Home</span></a></li>
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
            Result:
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- Your Page Content Here -->
          <?php
          include("dbcon.php");
          $result1 = mysqli_query($con,"SELECT COUNT(ResultId) FROM `Result` WHERE `BatchId`='$b_uid'");
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
            ?>
             <div class=table-responsive>        
<table class=table table-striped>
<thead>
<tr>
<th>Sr No.</th>
<th>Date of Test</th>
<th>Date of Upload</th>
<th>Title</th>
<th>Result</th>
</tr>
</thead>
<tbody>
<?php
include("dbcon.php");
error_reporting(0);
$i=0;
$result = mysqli_query($con,"SELECT * FROM Result where BatchId='$b_uid'");
while($r_row = mysqli_fetch_array($result))
{
$r_uid=$r_row['ResultId'];
$t=$r_row['ResultTitle'];
$total=$r_row['TotalMarks'];
$dou=$r_row['DateOfUpload'];
$dot=$r_row['DateOfTest'];
$i++;
$get_mks=mysqli_query($con,"SELECT Marks FROM StudentMarks WHERE ResultId='$r_uid' AND StudentId='$StudentId'");
while($mrow=mysqli_fetch_array($get_mks))
{
  $mks=$mrow['Marks'];
}
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
echo $t;
echo "</td>";
echo "<td>";
echo $mks."/".$total;
echo "</td>";
echo "</tr>";
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
