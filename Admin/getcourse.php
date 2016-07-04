<?php
$br=$_REQUEST['q'];
echo "<label for=menu1>Select Branch:</label><br>";
echo "<select class=tb5 name=menu1 onchange=showCustomer(this.value)>";
include("dbcon.php");
$result = mysqli_query($con,"SELECT * FROM `courses` where Branch_uid=$br");
while($row = mysqli_fetch_array($result))
{
$courses=$row['branch'];
$uid=$row['uid'];
echo "<option value=$uid>$courses</option>";
}
?>
</select><br><br>