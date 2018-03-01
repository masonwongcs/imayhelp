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

            $email = $_SESSION['email'];
            $queryEmail = "SELECT * FROM `register_user` WHERE email = '$email'";
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
            }

            $query = "SELECT * FROM `post` WHERE user_id = $currentUserId ORDER BY datetime DESC";
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
				      <td><button <button onclick="window.location.href=\'postEdit.php?serviceId=' . $serviceId . '\'" class="ui blue icon button edit post"><i class="edit icon"></i></button></td>
				      <td><button data-id="' . $serviceId . '" class="ui red icon button delete post"><i class="trash icon"></i></button></td>
				    </tr>';
            }
        ?>
	 </tbody>
</table>