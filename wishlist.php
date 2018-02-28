<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/semantic.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/slider.css">
    <title>IHELPYOU</title>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <?php include 'header.php';?>
            <div class="ui grid">
                
                <div class="three wide column">
                    <?php include('sideNav.php'); ?>
                </div>
                <div class="thirteen wide column listing-content">
                    <div class="sixteen wide column">
                        <div class="ui floating breadcrumb home-breadcrumb">
                            <a class="section">Home</a>
                            <i class="right angle icon divider"></i>
                            <div class="active section">Wishlist</div>
                        </div>
                        <div class="ui right floated icon basic buttons view-selection">
                            <div class="ui button card-view active"><i class="grid layout icon"></i></div>
                            <div class="ui button list-view"><i class="list layout icon"></i></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="ui divider"></div>
                    <div class="ui four stackable cards">
                        <?php
                            // include ('connection.php');

                            if (isset($_SESSION['email'])) {

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
                               
                            }

                            $queryWishlist = "SELECT * FROM `likes` WHERE user_id = '$currentUserId'";
                            $resultWishList = mysqli_query($link, $queryWishlist);

                            // Return item list to show in index
                            while($rowWishlist = mysqli_fetch_array($resultWishList))
                            {

                                $likeIdWishlist = $rowWishlist[0];
                                $serviceIdWishlist = $rowWishlist[1];
                                $userIdWishlist = $rowWishlist[2];

                                $query = "SELECT * FROM `post` WHERE services_id = '$serviceIdWishlist'";
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

                                    $imageLocation;

                                    if($uploadedLocation !== "uploadpicture/"){
                                        $imageLocation = $uploadedLocation;
                                    } else{
                                        $imageLocation = 'img/image.png';
                                    }

                                    if(!isset($currentUserId)){
                                        $currentUserId = 0;
                                    }

                                    $results = mysqli_query($link, "SELECT * FROM likes WHERE user_id=$currentUserId AND services_id=$serviceId");

                                    if (mysqli_num_rows($results) == 1 ){
                                        $active = "active";
                                    } else{
                                        $active = "";
                                    }

                                    echo '<div class="ui fluid card listing-item">';
                                    echo '    <a class="listing-link" href="listing.php?serviceId=' . $serviceId . '">Link To post</a>';
                                    echo '    <div class="image" style="background-image: url(' . $imageLocation . ')">';
                                    // echo '        <img src="' . $imageLocation .'">';
                                    echo '    </div>';
                                    echo '    <div class="content">';
                                    echo '        <div class="header">';
                                    echo '            <h5 class="ui header">'. $serviceName .'</h5>';
                                    echo '        </div>';
                                    echo '        <div class="meta">';
                                    echo '            <a>'. $description .'</a>';
                                    echo '        </div>';
                                    echo '    </div>';
                                    echo '    <div class="extra content">';
                                    echo '        <span class="right floated">';
                                    echo '            RM<span class="price">' . $price . '</span>';
                                    echo '        </span>';
                                    echo '        <span class="like-count" data-inverted="" data-tooltip="Add to Wishlist" data-position="top left" data-variation="mini">';
                                    echo '            <i class="like icon ' . $active . '" data-services-id="' . $serviceId . '"></i><span class="amount">' . $likes . '</span>';
                                    echo '        </span>';
                                    echo '    </div>';
                                    echo ' </div>';

                                }
                            }                               
                        ?>
                        
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