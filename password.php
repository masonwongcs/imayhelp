<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/semantic.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/slider.css">
    <title>Change Password</title>
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
                      echo '<div class="ui red inverted segment">Password update failed</div>';
                  }else{
                      echo '<div class="ui green inverted segment">Password update successful</div>';
                  }
              }
          ?>
          <div class="ui segment">
            <form class="ui form" action="updatePassword.php" method="post">
                <h4 class="ui dividing header">Change Password</h4>
                <div class="field">
                    <label>Old Password</label> 
                    <div class="sixteen wide field ui input">
                        <input type="password" name="oldPassword" placeholder="Old Password" required="required">
                    </div>
                </div>
                <div class="field">
                    <label>New Password</label>
                    <div class="sixteen wide field ui input">
                      <input type="password" name="newPassword" placeholder="New Password" required="required">
                    </div>
                </div>
                <div class="field">
                    <div class="sixteen wide field ui input">
                      <input type="password" name="confirmNewPassword" placeholder="Confirm New Password" required="required">
                    </div>
                    <div class="password-error ui pointing red basic label" style="display: none;">
                      Password does not match the confirm password.
                    </div>
                </div>
                <input type="hidden" name="email" placeholder="E-mail address" value="<?php echo $email;?>">
                <input type="hidden" name="password" placeholder="Password" value="<?php echo $pwd;?>">
                <button class="updateBtn fluid ui primary button disabled" type="submit" name="submit">Update Password</button>
            </form>
          </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>
<script type="application/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="application/javascript" src="js/semantic.min.js"></script>
<script type="application/javascript" src="js/slider.min.js"></script>
<script type="application/javascript" src="js/main.js"></script>
<script>
  $('input[name=oldPassword]').blur(function(){
    var oldPassword = $('input[name=password]').val();
    if(oldPassword === MD5($('input[name=oldPassword]').val())){
      $('.updateBtn').removeClass("disabled");
      $('input[name=oldPassword]').parents('.ui.input').removeClass('error');
    } else{
      $('.updateBtn').addClass("disabled");
      $('input[name=oldPassword]').parents('.ui.input').addClass('error');
    }
  });
  
  $('input[name=confirmNewPassword]').blur(function(){
    var newPassword = $('input[name=newPassword]').val();
    if(newPassword === $('input[name=confirmNewPassword]').val()){
      $('.updateBtn').removeClass("disabled");
      $('input[name=confirmNewPassword]').parents('.ui.input').removeClass('error');
      $('.password-error').fadeOut();
    } else{
      $('.updateBtn').addClass("disabled");
      $('input[name=confirmNewPassword]').parents('.ui.input').addClass('error');
      $('.password-error').fadeIn();
    }
  });

</script>
</body>
</html>