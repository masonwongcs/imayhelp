<html>
<head>
    <title>Submit Post</title>
</head>

<body>
<?php
include ('connection.php');

if(isset($_POST['submit'])) {
	//assign textbox to variable
	$acc=$_POST['Acc'];
	$name=$_POST['name'];
	$mobileno=$_POST['phone'];
	$address=$_POST['address'];
	$country=$_POST['location'];
	$services=$_POST['services'];
	$email=$_POST['email'];
	$password=$_POST['password'];
}

//insert data
$result = mysqli_query($link, "UPDATE register_user
	SET acc_SSM = '".$acc."', company_Name = '".$name."', mobileno = $mobileno, address = '".$address."', country = '".$country."', services = '".$services."'
	WHERE email = '".$email."'" ) or die(mysqli_error($link));

//data successfully added
	if ($result)
	{
		//Header is to redirect
		header ("location:profile.php?message=success");
	}
	else{
        header ("location:profile.php?message=error");
	}
	mysqli_close($link); 	 
?>
</body>
</html>