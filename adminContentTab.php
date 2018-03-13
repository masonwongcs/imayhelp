<?php
if($_SESSION['email'] != "Admin" || $_SESSION['email'] != "Alex"){
	header ("location:error.php");
}?>
<div class="ui top attached tabular menu">
  <div class="active item" data-tab="item">Service List</div>
  <div class="item" data-tab="user">User List</div>
</div>
<div class="ui bottom attached active tab segment" data-tab="item">
	<div class="ui hide green enable-message message">Enabled post <span class="post-id"></span></div>
	<div class="ui hide red disable-message message">Disabled post <span class="post-id"></span></div>
	<table class="ui celled table">
	  <thead>
	    <tr>
		    <th>ID</th>
		    <th>Name</th>
		    <th>Desc</th>
		    <th>Area</th>
		    <th>Price</th>
		    <th>Contact</th>
		    <th>Service</th>
		    <th>User</th>
		    <th>Date</th>
		    <th>Likes</th>
		    <th colspan="2">Action</th>
		  </tr>
		</thead>
	  	<tbody>
	  		<?php
                include ('connection.php');

                $query = "SELECT * FROM `post` ORDER BY datetime DESC";
                $result = mysqli_query($link, $query);

                // Return item list to show in index
                while($row = mysqli_fetch_array($result))
                {
                    $serviceId = $row[0];
                    $serviceName = $row[1];
                    $description = $row[2];
                    $location = $row[3];
                    $area = $row[4];
                    $price = $row[5];
                    $contact = $row[6];
                    $type = $row[7];
                    $uploadedLocation = $row[8];
                    $userId = $row[9];
                    $datetime = $row[10];
                    $likes = $row[11];
                    $display = $row[12];

                    if($display == "1"){
                    	$toggle = "active";
                    } else{
                    	$toggle = "";
                    }

                    echo '<tr>
					      <td><a href="listing.php?serviceId=' . $serviceId . '">' . $serviceId . '</a></td>
					      <td>' . $serviceName . '</td>
					      <td>' . $description . '</td>
					      <td>' . $area . '</td>
					      <td>' . $price . '</td>
					      <td>' . $contact . '</td>
					      <td>' . $type . '</td>
					      <td>' . $userId . '</td>
					      <td>' . $datetime . '</td>
					      <td>' . $likes . '</td>
			       		  <td><button data-id="' . $serviceId . '" class="ui toggle button enable-post icon '. $toggle .'"><i class="check square icon"></i></button></td>
					      <td><button data-id="' . $serviceId . '" class="ui red icon button delete post"><i class="trash icon"></i></button></td>
					    </tr>';
                }
            ?>
		 </tbody>
	</table>
</div>
<div class="ui bottom attached tab segment" data-tab="user">
	<table class="ui celled table">
	  <thead>
	    <tr>
		    <th>ID</th>
		    <th>First Name</th>
		    <th>Last Name</th>
		    <th>Email</th>
		    <th>Password</th>
		    <th>Mobile</th>
		    <th>Address</th>
		    <th>Country</th>
		    <th>Gender</th>
		    <th>SSM</th>
		    <th>Company Name</th>
		    <th>Service</th>
		  </tr>
		</thead>
	  	<tbody>
	  		<?php
                include ('connection.php');

                $queryEmail = "SELECT * FROM `register_user`";
                $resultEmail = mysqli_query($link, $queryEmail);
                while($rowEmail = mysqli_fetch_array($resultEmail, MYSQLI_NUM))
                {
                  $currentUserId = $rowEmail[0];
                  $firstName = $rowEmail[1];
                  $lastName = $rowEmail[2];
                  $email = $rowEmail[3];
                  $pwd = $rowEmail[4];
                  $mobileNo = $rowEmail[5];
                  $address = $rowEmail[6];
                  $country = $rowEmail[7];
                  $gender = $rowEmail[8];
                  $acc_SSM = $rowEmail[9];
                  $company_name = $rowEmail[10];
                  $service = $rowEmail[11];

                    echo '<tr>
					      <td>' . $currentUserId . '</td>
					      <td>' . $firstName . '</td>
					      <td>' . $lastName . '</td>
					      <td>' . $email . '</td>
					      <td>' . $pwd . '</td>
					      <td>' . $mobileNo . '</td>
					      <td>' . $address . '</td>
					      <td>' . $country . '</td>
					      <td>' . $gender . '</td>
					      <td>' . $acc_SSM . '</td>
					      <td>' . $company_name . '</td>
					      <td>' . $service . '</td>
					    </tr>';
                }
            ?>
		 </tbody>
	</table>
</div>