<?php
include ('connection.php');

//Check only admin has rights to delete
if($_SESSION['email'] == "Admin"){

	if (isset($_GET['services_id'])) {

		$services_id = $_GET['services_id'];

		//Delete data
		$result1 = mysqli_query($link, "DELETE FROM likes WHERE services_id = '".$services_id."'" ) or die(mysqli_error($link));
		$result1 = mysqli_query($link, "DELETE FROM post WHERE services_id = '".$services_id."'" ) or die(mysqli_error($link));
	}
}

 mysqli_close($link); 	 
?>