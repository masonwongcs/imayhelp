<?php
include ('connection.php');

if (isset($_GET['services_id']) && isset($_GET['toggle'])) {
	$services_id = $_GET['services_id'];
	$toggle = $_GET['toggle'];

	echo $services_id;
	echo $toggle;

	$result = mysqli_query($link, "UPDATE post
	SET display = '".$toggle."'
	WHERE services_id = '".$service_id."'" ) or die(mysqli_error($link));

	 if ($result)
	{
		//Header is to redirect
		header ("location:profile.php?message=success");
	}
	else{
        header ("location:profile.php?message=error");
	}
}
else {
	//Header is to redirect
	header ("location:error.php");
}
 mysqli_close($link); 	 
?>