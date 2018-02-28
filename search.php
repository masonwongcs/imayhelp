d<!DOCTYPE html>
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
            
                <div class="three wide column">
                    <?php include('sideNav.php'); ?>
                </div>
                <div class="thirteen wide column listing-content">
                    <div class="sixteen wide column">
                        <div class="ui floating breadcrumb home-breadcrumb">
                            <a class="section">Home</a>
                            <i class="right angle icon divider"></i>
                            <div class="active section">Service Category</div>
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
                            include ('connection.php');

                            if (isset($_GET['search']) && isset($_GET['page'])) {
                                $currentPage = $_GET['page'];
                                $search = $_GET['search'];
                                
                            } else{
                                $currentPage = 1;
                                $search = "";
                            }

                            $offset = ($currentPage - 1) * 16;
                            $query = "SELECT * FROM `post` WHERE service_name LIKE '$search%' ORDER BY datetime DESC LIMIT 16 OFFSET $offset";
                            $countTotalRows = "SELECT COUNT(services_id) FROM `post` WHERE service_name LIKE '$search%'";
                            
                            $result = mysqli_query($link, $query);
                            $totalRowsResult = mysqli_query($link, $countTotalRows);

                            
                            // Calculate total numbers of page
                            while($totalPagerows = mysqli_fetch_array($totalRowsResult, MYSQLI_NUM)){
                                $totalPage = $totalPagerows[0] / 16;
                                $lastPage = round($totalPage,0,PHP_ROUND_HALF_DOWN);
                            }

                            $count = mysqli_num_rows($result);

                            

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
                                echo '            <i class="like icon"></i><span class="amount">' . $likes .'</span>';
                                echo '        </span>';
                                echo '    </div>';
                                echo ' </div>';

                            }

                            if($count == 0){
                                 echo '<div class="ui segment">No result found.</div>';
                            }

                        ?>
                        

                    </div>
                </div>
                <div class="sixteen wide column">
                    <div class="ui right floated pagination menu">
                        <?php

                         if($count != 0){

                            if(!($currentPage == 1)){
                                echo '
                                    <a href="search.php?search=' . $search . '&page=1" class="icon item">
                                        <i class="angle double left icon"></i>
                                    </a>
                                ';

                                echo '
                                    <a href="search.php?search=' . $search . '&page=' . ($currentPage - 1) . '" class="icon item">
                                        <i class="angle left icon"></i>
                                    </a>
                                ';
                            }


                            if($currentPage == 1 || $currentPage == 2 || $currentPage == 3){
                                echo '<a href="search.php?search=' . $search . '&page=' . $currentPage . '" class="item disabled">' . $currentPage . '</a>';
                                echo '<a href="search.php?search=' . $search . '&page=' . ($currentPage + 1) . '" class="item">' . ($currentPage + 1) . '</a>';
                                echo '<a href="search.php?search=' . $search . '&page=' . ($currentPage + 2) . '" class="item">' . ($currentPage + 2) . '</a>';
                                echo '<div class="disabled item">...</div>';
                            } else if($currentPage > ($lastPage - 3) || $currentPage > ($lastPage - 2) || $currentPage > ($lastPage - 1)){
                                echo '<div class="disabled item">...</div>';
                                echo '<a href="search.php?search=' . $search . '&page=' . ($lastPage - 3) . '" class="item ' . (($lastPage - 3) == $currentPage ? 'disabled' : ''). '">' . ($lastPage - 3) . '</a>';
                                echo '<a href="search.php?search=' . $search . '&page=' . ($lastPage - 2) . '" class="item ' . (($lastPage - 2) == $currentPage ? 'disabled' : ''). '">' . ($lastPage - 2) . '</a>';
                                echo '<a href="search.php?search=' . $search . '&page=' . ($lastPage - 1) . '" class="item ' . (($lastPage - 1) == $currentPage ? 'disabled' : ''). '">' . ($lastPage - 1) . '</a>';
                                echo '<a href="search.php?search=' . $search . '&page=' . $lastPage . '" class="item ' . ($lastPage == $currentPage ? 'disabled' : ''). '">' . $lastPage . '</a>';
                            } else {
                                // echo '<div class="disabled item">...</div>';
                                echo '<a href="search.php?search=' . $search . '&page=' . ($currentPage - 2) . '" class="item">' . ($currentPage - 2) . '</a>';
                                echo '<a href="search.php?search=' . $search . '&page=' . ($currentPage - 1) . '" class="item">' . ($currentPage - 1) . '</a>';
                                echo '<a href="search.php?search=' . $search . '&page=' . $currentPage . '" class="item disabled">' . $currentPage . '</a>';
                                echo '<a href="search.php?search=' . $search . '&page=' . ($currentPage + 1) . '" class="item">' . ($currentPage + 1) . '</a>';
                                echo '<a href="search.php?search=' . $search . '&page=' . ($currentPage + 2) . '" class="item">' . ($currentPage + 2) . '</a>';
                                // echo '<div class="disabled item">...</div>';
                            }


                            if(!($currentPage == $lastPage)){
                                if(!($currentPage > ($lastPage - 3) || $currentPage > ($lastPage - 2) || $currentPage > ($lastPage - 1))){
                                    echo '
                                        <a href="search.php?search=' . $search . '&page=' . ($currentPage + 1) . '" class="icon item">
                                            <i class="angle right icon"></i>
                                        </a>
                                    ';

                                    echo '
                                        <a href="search.php?search=' . $search . '&page=' . $lastPage .'" class="icon item">
                                            <i class="angle double right icon"></i>
                                        </a>
                                    ';
                                }
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