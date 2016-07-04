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
    <form action=update_timetable.php method=get>
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
</tr>
</thead>
<tbody>
<?php
include("dbcon.php");
error_reporting(0);
$uid=$_REQUEST['branch'];
$result=mysqli_query($con,"SELECT * FROM `slots_timetable`");
while ($row= mysqli_fetch_array($result)) {
  $slots=$row['slots'];
}

$result1=mysqli_query($con,"SELECT * FROM `branch` WHERE `uid`='$uid'");
while($row=mysqli_fetch_array($result1))
{
  $br=$row['branch'];
}
for($i=0;$i<$slots;$i++)
{
  for($j=0;$j<=6;$j++)
  {
    $n="r".$i."c".$j;
    echo "<td>";
$get = mysqli_query($con,"SELECT * FROM `Timetable` WHERE `branch`='$br' && `id`='$n'");
while($row = mysqli_fetch_array($get))
{
$val=$row['value'];

}
echo "<input type=text name=$n value='$val'>";    
echo "</td>";
}
echo "</tr>";
  }
echo "</tbody></table>";
echo "<button type=submit class=btn btn-default name=branch value=$uid>Done</button>";
?><!-- /.col -->
</form>
        
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