<?php
include ('connection.php');

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}

if(isset($_POST['submit'])) {
	//assign textbox to variable
	$service_id=$_POST['service-id'];
	$service_name=$_POST['service-name'];
	$desc=$_POST['desc'];
	$location=$_POST['location'];
	$area=$_POST['area'];
	$price=$_POST['price'];
	$contactno=$_POST['contactno'];
}

$queryUser = "SELECT * FROM `register_user` WHERE email = '$email'";
$resultUser = mysqli_query($link, $queryUser);
while($rowUser = mysqli_fetch_array($resultUser, MYSQLI_NUM))
{
  $userId = $rowUser[0];
  $firstName_listing = $rowUser[1];
  $lastName_listing = $rowUser[2];
  $email_listing = $rowUser[3];
  // $pwd = $rowUser[4];
  // $mobileNo = $rowUser[5];
  // $address = $rowUser[6];
  // $country = $rowUser[7];
  // $gender = $rowUser[8];
  // $acc_SSM = $rowUser[9];
  $company_name_listing = $rowUser[10];
  // $service = $rowUser[11];
} 

//service_name, description, location, area, price,contact, uploadpicture, user_id, type
//insert data
$result = mysqli_query($link, "UPDATE post
	SET service_name = '".$service_name."', description = '".$desc."', location = '".$location."', area = '".$area."', price = '".$price."', contact = '".$contactno."'
	WHERE services_id = '".$service_id."'" ) or die(mysqli_error($link));

//data successfully added
 if ($result)
	{
		//Header is to redirect
		header ("location:listing.php?serviceId=" . $service_id);
	}
	else{
        // header ("location:error.php");
	}
 mysqli_close($link); 	 

 $_SESSION['email'] = $email;
?>