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
            <?php
                if (isset($_SESSION['email'])) {
                    //Display admin stuff
                    include 'mypostContent.php';
                } else{
                    echo '<div class="ui red inverted segment">You have no permission to view this page.</div>';
                }
            ?>
        </div>
    </div>
<?php include 'footer.php';?>
<div class="ui basic delete modal">
  <div class="ui icon header">
    <i class="archive icon"></i>
    Delete Confirmation
  </div>
  <div class="content">
    <p>Are you sure you want to delete?</p>
  </div>
  <div class="actions">
    <div class="ui red basic cancel inverted button">
      <i class="remove icon"></i>
      No
    </div>
    <div class="ui green ok inverted button">
      <i class="checkmark icon"></i>
      Yes
    </div>
  </div>
</div>
<script type="application/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="application/javascript" src="js/semantic.min.js"></script>
<script type="application/javascript" src="js/slider.min.js"></script>
<script type="application/javascript" src="js/main.js"></script>
</body>
</html>