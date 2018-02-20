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
$result = mysqli_query($link, "INSERT INTO register_user
(firstname, lastname, email, pwd, mobileno, address, country, gender, services) VALUES 
('$firstName','$lastName','$email','$password','$phone','$address', '$country', '$gender', '$services')" );

//data successfully added
	 if ($result)
		{
			// echo "Records inserted successfully.";
			echo "
                <script type=\"text/javascript\">
                    alert(\"Registration successful\");
                </script>
            ";
			//Header is to redirect
			header ("location:login.php?message=success");
		}
		else{
            header ("location:error.php");
		}
	 mysqli_close($link); 	 
?>
<?php echo $_POST["firstname"]; ?>
<?php echo $_POST["lastname"]; ?>
<?php echo $_POST["phone"]; ?>
<?php echo $_POST["address"]; ?>
<?php echo $_POST["country"]; ?>
<?php echo $_POST["gender"]; ?>
<?php echo $_POST["email"]; ?>
<?php echo $_POST["password"]; ?>

</body>
</html>