<?php
session_start();
var_dump($_SESSION);
var_dump($_FILES);
?>
<html>
<head>
    <title>Submit Post</title>
</head>

<body>
<?php
include ('connection.php');


$target_dir = "uploadpicture/";
$target_file = $target_dir . basename($_FILES["upload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST['submit'])) {

	$check = getimagesize($_FILES["upload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["upload"]["size"] > 200000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {

		$temp = explode(".", $_FILES["upload"]["tmp_name"]);
		$newfilename = round(microtime(true)) . '.' . end($temp);
		// move_uploaded_file($_FILES["upload"]["tmp_name"], $target_dir . $newfilename);

	    // if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
		
	    if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_dir . $newfilename)) {
	        echo "The file ". basename( $_FILES["upload"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}

	//assign textbox to variable
	$service_name=$_POST['service-name'];
	$desc=$_POST['desc'];
	$location=$_POST['location'];
	$area=$_POST['area'];
	$price=$_POST['price'];
	$contactno=$_POST['contactno'];
	$upload=$target_file;



	//Get current user information
	if (isset($_SESSION['email'])) {
        include ('connection.php');

        $email = $_SESSION['email'];
        $query = "SELECT * FROM `register_user` WHERE email = '$email'";
        $result = mysqli_query($link, $query);
        while($row = mysqli_fetch_array($result, MYSQLI_NUM))
        {
          $userId = $row[0];
          $firstName = $row[1];
          $lastName = $row[2];
          $email = $row[3];
          $pwd = $row[4];
          $mobileNo = $row[5];
          $address = $row[6];
          $country = $row[7];
          $gender = $row[8];
          $acc_SSM = $row[9];
          $company_name = $row[10];
          $service = $row[11];
        } 
    }
}


//insert data
$result = mysqli_query($link, "INSERT INTO post
(service_name, description, location, area, price,contact, uploadpicture, user_id, type) VALUES 
('$service_name','$desc','$location','$area','$price','$contactno', '$upload', '$userId', '$service')");

//data successfully added
	 if ($result)
		{
			// echo "Records inserted successfully.";

			//Header is to redirect
			header ("location:index.php?msg='Success'");
		}
		else{
            header ("location:error.php");
		}
	 mysqli_close($link); 	 
?>

</body>
</html>