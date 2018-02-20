<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/semantic.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/slider.css">
    <title>Profile</title>
</head>
<body>
<div class="container">
    <div class="wrapper">
        <?php include 'header.php';?>
        <?php
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
        ?>
        <div class="register-form-wrapper">
          <?php 
              if (isset($_GET['message'])) {
                  if($_GET['message'] === 'error'){
                      echo '<div class="ui red inverted segment">Profile failed to update</div>';
                  }else{
                      echo '<div class="ui green inverted segment">Profile update successful</div>';
                  }
              }
          ?>
          <div class="ui segment">
            <!-- Determine whether is user profile or company profile -->
              <?php
                if($firstName != "" || $lastName != ""){
                  include 'profileFormUser.php';
                } else {
                  include 'profileFormCompany.php';
                }
              ?>
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