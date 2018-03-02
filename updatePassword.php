<?php
include ('connection.php');

if(isset($_POST['submit'])) {
	//assign textbox to variable
	$newPassword=$_POST['newPassword'];
	$email=$_POST['email'];
}

//insert data
$result = mysqli_query($link, "UPDATE register_user
	SET pwd = '".$newPassword."'
	WHERE email = '".$email."'" ) or die(mysqli_error($link));

//data successfully added
 if ($result)
	{
		//Header is to redirect
		header ("location:password.php?message=success");
	}
	else{
        header ("location:password.php?message=error");
	}
 mysqli_close($link); 	 
?>