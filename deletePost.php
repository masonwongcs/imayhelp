<?php
include ('connection.php');

if (isset($_GET['services_id'])) {
	//Delete data
	$result1 = mysqli_query($link, "DELETE FROM likes WHERE services_id = '".$email."'" ) or die(mysqli_error($link));
	$result1 = mysqli_query($link, "DELETE FROM post WHERE services_id = '".$email."'" ) or die(mysqli_error($link));
}

 mysqli_close($link); 	 
?>