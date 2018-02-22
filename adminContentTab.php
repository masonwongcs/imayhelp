<div class="ui top attached tabular menu">
  <div class="active item">Service List</div>
  <div class="item">User List</div>
</div>
<div class="ui bottom attached active tab segment">
	<table class="ui celled table">
	  <thead>
	    <tr>
		    <th>ID</th>
		    <th>Name</th>
		    <th>Desc</th>
		    <th>Location</th>
		    <th>Area</th>
		    <th>Price</th>
		    <th>Contact</th>
		    <th>Service</th>
		    <th>User</th>
		    <th>Date</th>
		    <th>Likes</th>
		    <th>Action</th>
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

                    echo '<tr>
					      <td>' . $serviceId . '</td>
					      <td>' . $serviceName . '</td>
					      <td>' . $description . '</td>
					      <td>' . $location . '</td>
					      <td>' . $area . '</td>
					      <td>' . $price . '</td>
					      <td>' . $contact . '</td>
					      <td>' . $type . '</td>
					      <td>' . $userId . '</td>
					      <td>' . $datetime . '</td>
					      <td>' . $likes . '</td>
					      <td><button data-id="' . $serviceId . '" class="ui red button"><i class="trash icon"></i></button></td>
					    </tr>';
                }
            ?>
		 </tbody>
	</table>
</div>
<div class="ui bottom attached tab segment">

</div>