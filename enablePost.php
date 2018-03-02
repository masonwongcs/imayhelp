<?php
include ('connection.php');

if (isset($_GET['services_id']) && isset($_GET['toggle'])) {
	$services_id = $_GET['services_id'];
	$toggle = $_GET['toggle'];

	echo $services_id;
	echo $toggle;

	$result = mysqli_query($link, "UPDATE post SET display = $toggle WHERE services_id = $services_id" ) or die(mysqli_error($link));

	 if ($result)
	{
		//Header is to redirect
		// header ("location:profile.php?message=success");

		 echo "Affected rows: " . mysqli_affected_rows($link);

	}
	else{
        // header ("location:profile.php?message=error");

        header ("location:error.php");
	}
}
else {
	//Header is to redirect
	header ("location:error.php");
}
 mysqli_close($link); 	 
?>