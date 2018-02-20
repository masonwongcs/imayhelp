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
        <div class="ui bottom attached tab segment" data-tab="register">
            <form class="ui form" action="register.php" method="post">
                <h4 class="ui dividing header">User Information</h4>
                <div class="field">
                    <label>Name</label>
                    <div class="two fields">
                        <div class="field">
                            <input type="text" name="firstname" placeholder="First Name">
                        </div>
                        <div class="field">
                            <input type="text" name="lastname" placeholder="Last Name">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>Phone Number</label>
                    <div class="fields">
                        <div class="sixteen wide field">
                            <input type="tel" name="phone" placeholder="Phone Number">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>Address</label>
                    <div class="fields">
                        <div class="sixteen wide field">
                            <input type="text" name="address" placeholder="Street Address">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>Location</label>
                    <div class="ui fluid search selection dropdown">
                        <input type="hidden" name="country">
                        <i class="dropdown icon"></i>
                        <div class="default text">Select Location</div>
                        <div class="menu">
                           <div class="item" data-value="1">Kuala Lumpur</div>
                                <div class="item" data-value="2">Johor</div>
                                <div class="item" data-value="3">Kedah</div>
                                <div class="item" data-value="4">Kelantan</div>
                                <div class="item" data-value="5">Melaka</div>
                                <div class="item" data-value="6">Negeri Sembilan</div>
                                <div class="item" data-value="7">Pahang</div>
                                <div class="item" data-value="8">Penang</div>
                                <div class="item" data-value="9">Perak</div>
                                <div class="item" data-value="10">Perlis</div>
                                <div class="item" data-value="11">Putrajaya</div>
                                <div class="item" data-value="12">Selangor</div>
                                <div class="item" data-value="13">Sabah</div>
                                <div class="item" data-value="14">Sarawak</div>
                                <div class="item" data-value="15">Terengganu</div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>Gender</label>
                    <div class="ui fluid search selection dropdown">
                        <input type="hidden" name="gender">
                        <i class="dropdown icon"></i>
                        <div class="default text">Select Gender</div>
                        <div class="menu">
                            <div class="item" data-value="male">Male</div>
                            <div class="item" data-value="female">Female</div>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label>Services</label>
                    <div class="ui fluid search selection dropdown">
                        <input type="hidden" name="services">
                        <i class="dropdown icon"></i>
                        <div class="default text">Select Services</div>
                        <div class="menu">
                            <div class="item" data-value="IT">Agent</div>
                            <div class="item" data-value="IT">Consultant</div>
                            <div class="item" data-value="IT">Insturctor</div>
                            <div class="item" data-value="IT">Home and Office</div>
                            <div class="item" data-value="IT">Lifestyle</div>
                            <div class="item" data-value="IT">Technician</div>
                            <div class="item" data-value="Mechanic">More Services are coming...</div>
                        </div>
                    </div>
                </div>
                
                <h4 class="ui dividing header">Login Information</h4>
                    <div class="field">
                        <input type="text" name="email" placeholder="E-mail address">
                    </div>
                    <div class="field">
                        <input type="password" name="password" placeholder="Password">
                    </div>
                <button class="fluid ui primary button" type="submit" name="submit">Register</button>
            </form>
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