<?php
$path="../uploads/notes/garfield.pdf";
if(unlink($path))
echo "Deleted";
else
echo "Unable to delete";
?>