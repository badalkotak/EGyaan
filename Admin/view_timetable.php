<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Timetable</title>
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
          <!-- . However, you can choose any other skin. Make sure you -->
          <!-- apply the skin class to the body tag so the changes take effect. -->
  
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
          include("dbcon.php");
          $uid=$_REQUEST['branch'];

       $count=0;
          // $check=mysqli_query($con,"SELECT * FROM `Timetable` WHERE branch='$branch'");
          // while($c_row=mysqli_fetch_array($check))
          // {
          //   $count=$c_row['COUNT(id)'];
          // }
          $result12=mysqli_query($con,"SELECT * FROM `SlotTimetable`");
    while($row12=mysqli_fetch_array($result12)){$s=$row12['Slot'];}

for($i=0;$i<$s;$i++)
{
  for($j=0;$j<=7;$j++)
  {
    $n="r".$i."c".$j;
    //echo "<td>";
$result_t = mysqli_query($con,"SELECT * FROM Timetable where BatchId='$uid' && CellNo='$n'");
while($row_t = mysqli_fetch_array($result_t))
{
$val1=$row_t['CellValue'];
if($val1!="")
{
  $count++;
}
}
}
}

          if($count==0)
          {
            echo "<h3><strong>No Timetable Added Yet!</strong><br><br></h3>";
          }
          else
          {
            ?>
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th>Time</th>
<th>Monday</th>
<th>Tuesday</th>
<th>Wednesday</th>
<th>Thursday</th>
<th>Friday</th>
<th>Saturday</th>
<th>Sunday</th>
</tr>
</thead>
<tbody>
<?php

error_reporting(0);

// for($i=0;$i<$s;$i++)
// {
//   for($j=0;$j<=6;$j++)
//   {
//     $n="r".$i."c".$j;
//     echo "<td>";
// $result_tt = mysqli_query($con,"SELECT * FROM Timetable where branch='$br' && id='$n'");
// while($row_tt = mysqli_fetch_array($result_tt))
// {
// $val=$row_tt['value'];

// }
for($i=0;$i<$s;$i++)
{
  for($j=0;$j<=7;$j++)
  {
    $n="r".$i."c".$j;
    echo "<td>";
$get = mysqli_query($con,"SELECT * FROM `Timetable` WHERE `BatchId`='$uid' && `CellNo`='$n'");
while($row = mysqli_fetch_array($get))
{
$val=$row['CellValue'];

}
echo $val;
echo "</td>";
}
echo "</tr>";
  }
echo "</tbody></table>";
}
?><!-- /.col -->
        
        <script src="AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="AdminLTE/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="AdminLTE/dist/js/app.min.js"></script>

    <script>

</script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
  </body>
</html>
