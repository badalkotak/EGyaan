<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Attendence</title>
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

  <body>
  	<form action="add_attendence.php" method="post">
  	<div class="table-responsive">        
<table class="table">
<thead>
<tr>
<th>Sr No.</th>
<th>Student Name</th>
<th>Attendence</th>
</tr>
</thead>
<tbody>
  	<?php
  	$i=0;
  	$cuid=$_REQUEST['cuid'];
  	include("dbcon.php");
  	$result=mysqli_query($con,"SELECT * FROM course_reg WHERE course_uid='$cuid'");
  	while($row=mysqli_fetch_array($result))
  	{
  		$semail=$row['semail'];
  		$sname=mysqli_query($con,"SELECT * FROM Student_Login WHERE semail='$semail'");
  		while($srow=mysqli_fetch_array($sname))
  		{
  			$i++;
  			$fname=$srow['fname'];
  			$lname=$srow['lname'];
  			$name=$fname." ".$lname;
  			$suid=$srow['uid'];
        $b=$srow['branch'];
        $br=urlencode($b);
  			echo "<tr><td>";
  			echo $i;
  			echo "</td>";
  			echo "<td>";
  			echo $name;
  			echo "</td>";
  			echo "<td>";
  			echo "<input type=checkbox name=$suid value=P checked>";
  			echo "</td></tr>";
  		}
  	}
  	?>
  </tbody>
</table>
</div>
<?php
echo "<button type=submit class=btn btn-success name=course value=$cuid>Done</button>";
?>
</form>
  </body>
</html>