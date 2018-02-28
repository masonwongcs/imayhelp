<?php
session_start();
?>
<div class="ui menu margin-top">
	
	<div class="header item"><a href="index.php"><img class="ui fluid image logo" src="img/logo-new-text.png" ></a></div>
    <div class="ui pointing dropdown link item"> <!--opening services-->
        <span class="text">Services</span>
        <i class="dropdown icon"></i>
        <div class="menu">
            <a class="item" href="searchType.php?type=Agent&page=1">Agent</a>
            <a class="item" href="searchType.php?type=Consultant&page=1">Consultant</a>
            <a class="item" href="searchType.php?type=Insturctor&page=1">Instructor</a>
            <a class="item" href="searchType.php?type=Home&page=1">Home and Office</a>
            <a class="item" href="searchType.php?type=Lifestyle&page=1">Lifestyle</a>
            <a class="item" href="searchType.php?type=ITTechnician&page=1">IT Technician</a>
        </div>
    </div> <!--closing services-->

    <div class="ui pointing dropdown link item">  <!--opening location-->
        <span class="text">Location</span>
        <i class="dropdown icon"></i>
        <div class="menu">
            <a href="searchLocation.php?location=1&page=1" class="item" data-value="1">Kuala Lumpur</a>
            <a href="searchLocation.php?location=2&page=1" class="item" data-value="2">Johor</a>
            <a href="searchLocation.php?location=3&page=1" class="item" data-value="3">Kedah</a>
            <a href="searchLocation.php?location=4&page=1" class="item" data-value="4">Kelantan</a>
            <a href="searchLocation.php?location=5&page=1" class="item" data-value="5">Melaka</a>
            <a href="searchLocation.php?location=6&page=1" class="item" data-value="6">Negeri Sembilan</a>
            <a href="searchLocation.php?location=7&page=1" class="item" data-value="7">Pahang</a>
            <a href="searchLocation.php?location=8&page=1" class="item" data-value="8">Penang</a>
            <a href="searchLocation.php?location=9&page=1" class="item" data-value="9">Perak</a>
            <a href="searchLocation.php?location=10&page=1" class="item" data-value="10">Perlis</a>
            <a href="searchLocation.php?location=11&page=1" class="item" data-value="11">Putrajaya</a>
            <a href="searchLocation.php?location=12&page=1" class="item" data-value="12">Selangor</a>
            <a href="searchLocation.php?location=13&page=1" class="item" data-value="13">Sabah</a>
            <a href="searchLocation.php?location=14&page=1" class="item" data-value="14">Sarawak</a>
            <a href="searchLocation.php?location=15&page=1" class="item" data-value="15">Terengganu</a>
        </div> <!--closing selection state-->
    </div> <!--closing location-->
	
    <a class="item"a href="aboutus.php">About Us</a>

    <div class="right menu">
        <div class="item">
            <div class="ui search">
                <div class="ui icon input">
                    <input id="search" class="prompt" type="text" placeholder="Search for service...">
                    <i class="search blue icon"></i>
                </div>
                <div class="results"></div>
            </div>
        </div>
        <!--================================-->
        <!--Only show this if user had login-->
        <?php
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

            if($firstName != "" || $lastName != ""){
                $displayName = $firstName . " " . $lastName;
            } else {
                $displayName = $company_name;
            }

            //this line important to show company name or username

            echo '
            <div class="ui pointing dropdown link item company-name">
            <span>' . $displayName . '</span>
            <i class="dropdown icon"></i>
            <div class="menu">';

            if($_SESSION['email'] == "Admin"){
                echo '<a class="item" href="admin.php">
                    <i class="address card icon"></i>
                    <span>Admin Panel</span>
                </a>';
            }

            echo  '<a class="item" href="profile.php">
                    <i class="user icon"></i>
                    <span>Profile</span>
                </a>
                <a class="item" href="mypost.php">
                    <i class="book icon"></i>
                    <span>My Post</span>
                </a>
                <a class="item" href="wishlist.php">
                    <i class="heart icon"></i>
                    <span>Wishlist</span>
                </a>
                <a class="item" href="password.php">
                    <i class="lock icon"></i>
                    <span>Change Password</span>
                </a>
                <a class="item" href="logout.php">
                    <i class="sign out icon"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
        ';

        echo '<input type="hidden" id="currentSession" data-current-user="' . $userId . '" />';
            
        } else{
            echo '<a class="item" href="login.php">Login / Register</a>';
            echo '<input type="hidden" id="currentSession" data-value="" />';
        }
        ?>
        
        
        <!--================================-->
       <div class="item"> 
          <a class="ui primary button" href="<?php 
          if (isset($_SESSION['email'])) {
            echo 'post.php';
          } else{
            echo 'login.php?message=error';
          }
          ?>">
                Post AD
           </a>
        </div>
    </div>
</div>