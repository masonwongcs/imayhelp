<?php 
    // connect to the database
    include ('connection.php');

    if (isset($_POST['liked'])) {
        $postid = $_POST['postid'];
        $userid = $_POST['userid'];
        $result = mysqli_query($link, "SELECT * FROM post WHERE services_id=$postid");
        $row = mysqli_fetch_array($result);
        $n = $row['likes'];

        mysqli_query($link, "INSERT INTO likes (user_id, services_id) VALUES ($userid, $postid)");
        mysqli_query($link, "UPDATE post SET likes=$n+1 WHERE services_id=$postid");

        echo $n+1;
        exit();
    }
    if (isset($_POST['unliked'])) {
        $postid = $_POST['postid'];
        $userid = $_POST['userid'];
        $result = mysqli_query($link, "SELECT * FROM post WHERE services_id=$postid");
        $row = mysqli_fetch_array($result);
        $n = $row['likes'];

        mysqli_query($link, "DELETE FROM likes WHERE services_id=$postid AND user_id=$userid");
        mysqli_query($link, "UPDATE post SET likes=$n-1 WHERE services_id=$postid");
        
        echo $n-1;
        exit();
    }
?>
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
                    if($_SESSION['email'] == "Admin"){
                        //Display admin stuff
                    } else{
                        echo '<div class="ui red inverted segment">You have no permission to view this page.</div>';
                    }
                }
            ?>
        </div>
    </div>
<?php include 'footer.php';?>
<script type="application/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="application/javascript" src="js/semantic.min.js"></script>
<script type="application/javascript" src="js/slider.min.js"></script>
<script type="application/javascript" src="js/main.js"></script>
</body>
</html>