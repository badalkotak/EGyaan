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
    <div class="table-responsive">
<table class="table">
<thead>
<tr>
<th>Sr. No.</th>
<th>Student Name</th>
<th>Total</th>
<th>Amount Paid</th>
<th>Amount Pending</th>
<th>Update Amount</th>
<th>Comments</th>
</tr>
</thead>
<tbody>
    <?php
          include("dbcon.php");
          $uid=$_REQUEST['bruid'];

$total=array();
$pending=array();
$i=0;
$total_amt=0;
$student=mysqli_query($con,"SELECT * FROM Student WHERE BatchId='$uid'");
while($srow=mysqli_fetch_array($student))
{
  $paid_amt=$srow['FeesPaid'];
  $comment=$srow['FeesComment'];
  $suid=$srow['StudentId'];
  $fname=$srow['StudentFname'];
  $lname=$srow['StudentLname'];
  $sname=$fname." ".$lname;

  $total_amt=0;
  $getCourses=mysqli_query($con,"SELECT * FROM StudentCourseRegistration WHERE StudentId='$suid'");
  while($gc=mysqli_fetch_array($getCourses))
  {
    $c_uid=$gc['CourseId'];
    $getCost=mysqli_query($con,"SELECT Fees FROM Course WHERE CourseId='$c_uid'");
    while($gcost=mysqli_fetch_array($getCost))
    {
      $fees=$gcost['Fees'];
      $total_amt=$total_amt+$fees;
      // echo $total_amt;
    }
    
    $p=$total_amt-$paid_amt;
    array_push($pending, $p);
    
    $t=0;
  }
  array_push($total,$total_amt);
  $i++;
      echo "<tr>";
      echo "<td>";
      echo $i;
      echo "</td>";

      echo "<td>";
      echo $sname;
      echo "</td>";

      echo "<td>";
      echo $total[$i-1];
      
      echo "</td>";

      echo "<td>";
      echo $paid_amt;
      echo "</td>";

      echo "<td>";
        $p=$total[$i-1]-$paid_amt;
        if($p==0)
          echo "<strong>Paid!</strong>";
        else
          echo $p;
      echo "</td>";

      echo "<td>";
      echo '<div class="col-md-8">
              <div class="box box-default collapsed-box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Update Amount</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form action="AddPHPFiles/AddAmount.php" role="form" method="post">

<div class="form-group has-feedback">';
if($p!=0)
{
echo '<label for="course">Add Amount: '.$paid_amt.' + </label>';
?>
            <input type="text" class="form-control" placeholder="Amount" name="fees" id="fees">
            <div id="errmsg"></div>
            
</div>



<? echo "<button type=submit class=btn btn-default name=uid value='$suid'>Add</button>" ;

}
else
{
  echo "Amount Paid!";
}
echo '</form><!-- /.box-body -->';
?>
              </div><!-- /.box -->
            </div>
<?
      echo "</td>";

      echo "<td>";
      if($comment!="")
      echo $comment;
      else
        echo "No Comment";
      echo "</td>";

      echo "</tr>";
    }

  


echo '</tbody>
</table>
</div>';


?><!-- /.col -->
        
        <script src="AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="AdminLTE/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="AdminLTE/dist/js/app.min.js"></script>

    <script>

// $(document).ready(function () {
//   //called when key is pressed in textbox
//   $("#fees").keypress(function (e) {
//      //if the letter is not digit then display error and don't type anything
//      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
//         //display error message
//         $("#errmsg").html("Digits Only").show().fadeOut("slow");
//                return false;
//     }
//    });
// });

</script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
  </body>
</html>
