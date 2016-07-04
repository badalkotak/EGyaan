<?php
include("dbcon.php");
$result1=mysqli_query($con,"SELECT * FROM `slots_timetable`");
    while($row=mysqli_fetch_array($result1)){$s=$row['slots'];}
    $branch="First Standard";
    
    $time=array();
    $mon=array();
    $tue=array();
    $wed=array();
    $thu=array();
    $fri=array();
    $sat=array();

for($i=0;$i<$s;$i++)
{
  for($j=0;$j<=6;$j++)
  {
  	$r=$i;
  	$c=$j;
    $n="r".$i."c".$j;
    
$get = mysqli_query($con,"SELECT * FROM `Timetable` WHERE `branch`='$branch' && `id`='$n'");
while($row = mysqli_fetch_array($get))
{
$val=$row['value'];
if($c==0)
	array_push($time, $val);
else if($c==1)
	array_push($mon, $val);
else if($c==2)
	array_push($tue, $val);
else if($c==3)
	array_push($wed, $val);
else if($c==4)
	array_push($thu, $val);
else if($c==5)
	array_push($fri, $val);
else if($c==6)
	array_push($sat, $val);
}
}
}

$length=sizeof($time);
//arrays are ready

$monday='{"day":"monday","timetable":[';
for($k=0;$k<$length;$k++)
{
	$t=$time[$k];
	$sub=$mon[$k];
	if($k==$length-1)
	$monday=$monday.'{"time": "'.$t.'","subject": "'.$sub.'"}';
	else
		$monday=$monday.'{"time": "'.$t.'","subject": "'.$sub.'"},';
}
$monday=$monday.']}';

$tuesday='{"day":"tuesday","timetable":[';
for($k=0;$k<$length;$k++)
{
	$t=$time[$k];
	$sub=$tue[$k];
	if($k==$length-1)
	$tuesday=$tuesday.'{"time": "'.$t.'","subject": "'.$sub.'"}';
	else
		$tuesday=$tuesday.'{"time": "'.$t.'","subject": "'.$sub.'"},';
}
$tuesday=$tuesday.']}';

$wednesday='{"day":"wednesday","timetable":[';
for($k=0;$k<$length;$k++)
{
	$t=$time[$k];
	$sub=$wed[$k];
	if($k==$length-1)
	$wednesday=$wednesday.'{"time": "'.$t.'","subject": "'.$sub.'"}';
	else
		$wednesday=$wednesday.'{"time": "'.$t.'","subject": "'.$sub.'"},';
}
$wednesday=$wednesday.']}';

$thursday='{"day":"thursday","timetable":[';
for($k=0;$k<$length;$k++)
{
	$t=$time[$k];
	$sub=$thu[$k];
	if($k==$length-1)
	$thursday=$thursday.'{"time": "'.$t.'","subject": "'.$sub.'"}';
	else
		$thursday=$thursday.'{"time": "'.$t.'","subject": "'.$sub.'"},';
}
$thursday=$thursday.']}';

$friday='{"day":"friday","timetable":[';
for($k=0;$k<$length;$k++)
{
	$t=$time[$k];
	$sub=$fri[$k];
	if($k==$length-1)
	$friday=$friday.'{"time": "'.$t.'","subject": "'.$sub.'"}';
	else
		$friday=$friday.'{"time": "'.$t.'","subject": "'.$sub.'"},';
}
$friday=$friday.']}';

$saturday='{"day":"saturday","timetable":[';
for($k=0;$k<$length;$k++)
{
	$t=$time[$k];
	$sub=$sat[$k];
	if($k==$length-1)
	$saturday=$saturday.'{"time": "'.$t.'","subject": "'.$sub.'"}';
	else
		$saturday=$saturday.'{"time": "'.$t.'","subject": "'.$sub.'"},';
}
$saturday=$saturday.']}';

echo $json_string='['.$monday.','.$tuesday.','.$wednesday.','.$thursday.','.$friday.','.$saturday.']';

?>