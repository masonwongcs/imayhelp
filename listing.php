<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/semantic.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/slider.css">
    <title>Service Listing</title>
</head>
<body>
<div class="container">
    <div class="wrapper">
        <?php include 'header.php';?>

        <?php
            include ('connection.php');

            if (isset($_GET['serviceId'])) {

                $serviceId = $_GET['serviceId'];
                if($serviceId == ""){
                    echo "
                        <script type=\"text/javascript\">
                            location.href = \"error.php\";
                        </script>
                    ";
                }
                $query = "SELECT * FROM `post` WHERE services_id = '$serviceId'";
                $result = mysqli_query($link, $query);
                while($row = mysqli_fetch_array($result, MYSQLI_NUM))
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

                    $imageLocation;

                    if($uploadedLocation !== ""){
                        $imageLocation = $uploadedLocation;
                    } else{
                        $imageLocation = 'img/image.png';
                    }
                }

                //Get current user information
                $queryUser = "SELECT * FROM `register_user` WHERE user_id = '$userId'";
                $resultUser = mysqli_query($link, $queryUser);
                while($rowUser = mysqli_fetch_array($resultUser, MYSQLI_NUM))
                {
                  // $userId = $rowUser[0];
                  $firstName_listing = $rowUser[1];
                  $lastName_listing = $rowUser[2];
                  // $email = $rowUser[3];
                  // $pwd = $rowUser[4];
                  // $mobileNo = $rowUser[5];
                  // $address = $rowUser[6];
                  // $country = $rowUser[7];
                  // $gender = $rowUser[8];
                  // $acc_SSM = $rowUser[9];
                  $company_name_listing = $rowUser[10];
                  // $service = $rowUser[11];
                } 

                if($firstName_listing != "" || $lastName_listing != ""){
                    $displayName_listing = $firstName_listing . " " . $lastName_listing;
                } else {
                    $displayName_listing = $company_name_listing;
                }

            } else {
                // Fallback behaviour goes here
               echo "
                    <script type=\"text/javascript\">
                        location.href = \"error.php\";
                    </script>
                ";
            }
        ?>
        <div class="ui grid">
            <div class="eight wide column">
                <img class="ui fluid image" src="<?php 
                echo $imageLocation 
                ?>">
            </div>
            <div class="eight wide column contact-info">
                <div class="ui segment">
                    <h2 class="ui header"><?php echo $serviceName ?></h2>
                    <div class="sub header">
                       <?php echo $description ?>
                    </div>
                    <div class="ui divider"></div>
                    <div class="ui horizontal segments">
                        <div class="ui segment">
                            <i class="user icon"></i>
                            <span class="content">
                                <?php echo $displayName_listing?>
                            </span>
                        </div>
                        <div class="ui segment">
                            <i class="tag icon"></i>
                            <span class="content">
                                RM<span class="price"><?php echo $price ?></span>
                            </span>
                        </div>
                        <div class="ui segment">
                            <i class="like icon"></i>
                            <span class="content">
                                <span class="likes"><?php echo $likes?></span>
                            </span>
                        </div>
                    </div>
                    <div class="ui horizontal segments">
                      <div class="ui segment">
                          <i class="address card outline icon"></i>
                          <span class="content">
                              <span class="type"><?php echo $type?></span>
                          </span>
                      </div>
                      <div class="ui segment">
                          <i class="map marker alternate icon"></i>
                          <span class="content">
                              <span class="area"><?php echo $area?></span>
                          </span>
                      </div>
                    </div>
                    <button class="fluid ui primary button call-btn"><i class="call icon"></i><span class="phone-number"><?php echo $contact ?></span></button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>
<script type="application/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="application/javascript" src="js/semantic.min.js"></script>
<script type="application/javascript" src="js/slider.min.js"></script>
<script type="application/javascript" src="js/main.js"></script>
</body>
</html>