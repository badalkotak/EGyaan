<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Textbook</title>
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
  <body>
<?php
          include("dbcon.php");
          $result1 = mysqli_query($con,"SELECT COUNT(TextBookId) FROM `Textbook`");
          while($row1 = mysqli_fetch_array($result1))
          {
            $count=$row1['COUNT(TextBookId)'];
          }
          if($count==0)
          {
            echo "<h3><strong>No Textbook Added Yet!</strong><br><br></h3>";
          }
          else
          {
include("dbcon.php");
error_reporting(0);
$c=$_REQUEST['menu1'];
echo "<div class=table-responsive>";
echo "<table class=table table-striped>";
echo "<thead>";
echo "<tr>";
echo "<th>Sr No.</th>";
echo "<th>Book Name</th>";
echo "<th>View</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
$i=0;
$result = mysqli_query($con,"SELECT * FROM `Textbook` WHERE `CourseId`='$c'");
while($row = mysqli_fetch_array($result))
{
$b=$row['TextbookName'];
$path=$row['TextbookFile'];
$i++;
echo "<tr>";
echo "<td>";
echo $i;
echo "</td>";
echo "<td>";
echo $b;
echo "</td>";
echo "<td>";
echo "<a href=$path>View</a>";
echo "</td>";
echo "</tr>";
}
echo "</tbody>";
echo "</table>";
}
//echo "Book:$b";echo $path;
?>        
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
