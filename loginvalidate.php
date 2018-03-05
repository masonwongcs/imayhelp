<?php
    session_start();
    require('connection.php');
    //3. If the form is submitted or not.
    //3.1 If the form is submitted
    if (isset($_POST['email']) and isset($_POST['password'])) {
        //3.1.1 Assigning posted values to variables.
        $email    = $_POST['email'];
        $password = $_POST['password'];

        $hashedPassword = md5($password);
        
        //3.1.2 Checking the values are existing in the database or not
        $query    = "SELECT * FROM `register_user` WHERE email='$email' and pwd='$hashedPassword'";

        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $count = mysqli_num_rows($result);

        //3.1.2 If the posted values are equal to the database values, then session will be created for the user.
        if ($count == 1) {
            $_SESSION['email'] = $email;
        } else {
            //3.1.3 If the login credentials doesn't match, he will be shown with an error message.
            $fmsg = "Invalid Login Credentials.";
        }
    }
    // 3.1.4 if the user is logged in Greets the user with message
    if (isset($_SESSION['email'])) {
        // $email = $_SESSION['email'];
        // echo "Hi " . $email . "
        //         ";
        // echo "This is the Members Area
        //         ";
        // echo "<a href='logout.php'>Logout</a>";
        if($_SESSION['email'] == "Admin"){
            header ("location:admin.php");
        } else{
            header ("location:index.php");
        }

    } else {
        //3.2 When the user visits the page first time, simple login form will be displayed.
        header ("location:login.php?message=error");
    }
?>