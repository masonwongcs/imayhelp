<?php
session_start();
?>
<div class="ui menu margin-top">
	
	<div class="header item"><a href="index.php"><img class="ui fluid image" src="img/logo.jpg" ></a></div>
    <div class="ui pointing dropdown link item"> <!--opening services-->
        <span class="text">Services</span>
        <i class="dropdown icon"></i>
        <div class="menu">
            <div class="header">Categories</div>
            <a class="item" href="searchType.php?type=Agent&page=1">Agent</a>
            <a class="item" href="searchType.php?type=Consultant&page=1">Consultant</a>
            <a class="item" href="searchType.php?type=Insturctor&page=1">Insturctor</a>
            <a class="item" href="searchType.php?type=Home&page=1">Home and Office</a>
            <a class="item" href="searchType.php?type=Lifestyle&page=1">Lifestyle</a>
            <a class="item" href="searchType.php?type=Technician&page=1">Technician</a>
        </div>
    </div> <!--closing services-->

    <div class="ui pointing dropdown link item">  <!--opening location-->
        <span class="text">Location</span>
        <i class="dropdown icon"></i>
        <div class="menu">
            
            <div class="item">Kuala Lumpur</div>
            <div class="item">Entire Malaysia</div>
            <div class="divider"></div> <!--seperator-->
			
			<div class="item">   <!-- opening selection of state-->
                <i class="dropdown icon"></i>
				<span class="text">Johor</span>
                <div class="menu">
                    <div class="item">Johor Bahru</div>
                    <div class="item">Batu Pahat</div>
                </div>
                
            </div>
			
			<div class="item">
                <i class="dropdown icon"></i>
				<span class="text">Kedah</span>
                <div class="menu">
                    <div class="item">Alor Setar</div>
                    <div class="item">Sungai Petani</div>
                </div>
                
            </div>
			
			<div class="item">
                <i class="dropdown icon"></i>
				<span class="text">Kelantan</span>
                <div class="menu">
                    <div class="item">Jeli</div>
                    <div class="item">Kota Bharu</div>
                </div>
                
            </div>
			
			<div class="item">
                <i class="dropdown icon"></i>
				<span class="text">Melaka</span>
                <div class="menu">
                    <div class="item">Alor Gajah</div>
                    <div class="item">Masjid Tanah</div>
                </div>
                
            </div>
			
			<div class="item">
                <i class="dropdown icon"></i>
				<span class="text">Negeri Sembilan</span>
                <div class="menu">
                    <div class="item">Seremban</div>
                    <div class="item">Tampin</div>
                </div>
                
            </div>
			
			<div class="item">
                <i class="dropdown icon"></i>
				<span class="text">Pahang</span>
                <div class="menu">
                    <div class="item">Bandar Pusat Jengka</div>
                    <div class="item">Genting Highland</div>
                </div>
                
            </div>
			
			<div class="item">
                <i class="dropdown icon"></i>
				<span class="text">Penang</span>
                <div class="menu">
                    <div class="item">Georgetown</div>
                    <div class="item">Balik Pulau</div>
                </div>
                
            </div>
			
			<div class="item">
                <i class="dropdown icon"></i>
				<span class="text">Perak</span>
                <div class="menu">
                    <div class="item">Ipoh</div>
                    <div class="item">Kampar</div>
                </div>
                
            </div>
			
			<div class="item">
                <i class="dropdown icon"></i>
				<span class="text">Perlis</span>
                <div class="menu">
                    <div class="item">Kuala Perlis</div>
                    <div class="item">Padang Besar</div>
                </div>
                
            </div>
			
			<div class="item">Putrajaya</div>
			
			<div class="item">
                <i class="dropdown icon"></i>
				<span class="text">Selangor</span>
                <div class="menu">
                    <div class="item">Bandar Kinrara</div>
                    <div class="item">Bandar Sunway</div>
                </div>
                
            </div>
			
			<div class="item">
                <i class="dropdown icon"></i>
				<span class="text">Sabah</span>
                <div class="menu">
                    <div class="item">Kota Kinabalu</div>
                    <div class="item">Kota Kinabatangan</div>
                </div>
                
            </div>
			
			<div class="item">
                <i class="dropdown icon"></i>
				<span class="text">Sarawak</span>
                <div class="menu">
                    <div class="item">Bintulu</div>
                    <div class="item">Kapit</div>
                </div>
                
            </div>
			
			<div class="item">
                <i class="dropdown icon"></i>
				<span class="text">Terengganu</span>
                <div class="menu">
                    <div class="item">Hulu Terengganu</div>
                    <div class="item">Kuala Terengganu</div>
                </div>
                
            </div>
			
			
            
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
            <div class="menu">
                <a class="item" href="profile.php">
                    <i class="user icon"></i>
                    <span>Profile</span>
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