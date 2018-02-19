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
$result = mysqli_query($link, "INSERT INTO register_user
(acc_SSM, company_Name, mobileno, address, country, services, email, pwd) VALUES 
('$acc','$name','$mobileno','$address','$country','$services', '$email', '$password')" );

//data successfully added
	 if ($result)
		{
			// echo "Records inserted successfully.";

			//Header is to redirect
			// header ("location:index0.html?msg='Success'");
			header ("location:login.php?message=success");
		}
		else{
            header ("location:error.php");
		}
	 mysqli_close($link); 	 
?>
</body>
</html>