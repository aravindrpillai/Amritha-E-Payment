<?php

$conn = mysqli_connect('localhost','root','',"amritha"); 
if (mysqli_connect_errno($conn))
{
	echo "Failed to connect to MySQL: [file : database.php] . Reason: " . mysqli_connect_error();
} 


?>