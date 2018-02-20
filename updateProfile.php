<html>
<head>
    <title>Submit Post</title>
</head>

<body>
<?php
include ('connection.php');

if(isset($_POST['submit'])) {
	//assign textbox to variable
	$firstName=$_POST['firstname'];
	$lastName=$_POST['lastname'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$country=$_POST['country'];
	$gender=$_POST['gender'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$services=$_POST['services'];
}

//insert data
$result = mysqli_query($link, "UPDATE register_user
	SET firstname = $firstName, lastname = $lastName, mobileno = $phone, address = $address, country = $country, gender = $gender, services = $services
	WHERE email = '".$email."'" ) or die(mysqli_error($link));

//data successfully added
 if ($result)
	{
		//Header is to redirect
		// header ("location:login.php?message=success");
	}
	else{
        // header ("location:error.php");
	}
 mysqli_close($link); 	 
?>
</body>
</html>