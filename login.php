<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/semantic.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/slider.css">
    <title>Login</title>
</head>
<body>
<script type="application/javascript" src="js/jquery-3.2.1.min.js"></script>
<div class="container">
    <div class="wrapper">
        <?php include 'header.php';?>
        <div class="register-form-wrapper">
            <?php 
                if (isset($_GET['message'])) {
                    if($_GET['message'] === 'error'){
                        echo '<div class="ui red inverted segment">Invalid login, please try again.</div>';
                    }else{
                        echo '<div class="ui green inverted segment">Register successful, please login.</div>';
                    }
                }
            ?>
            <div class="ui top attached tabular menu">
                <a class="item active" data-tab="login">Login</a>
                <a class="item" data-tab="register">User Register</a>
				<a class="item" data-tab="comregister">Company Register</a>
            </div>
            <div class="ui bottom attached tab segment active" data-tab="login">
                <form action="loginvalidate.php" method="post">
                    <div class="ui form">
                        <div class="field full-width">
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input required="required"  type="text" name="email" placeholder="E-mail address">
                            </div>
                        </div>
                        <div class="field full-width">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input required="required"  type="password" name="password" placeholder="Password">
                            </div>
                        </div>
                        <button class="fluid ui primary button" type="submit" name="submit">Login</button>
                    </div>
                </form>
            </div>
			
            <div class="ui bottom attached tab segment user" data-tab="register">
                <form class="ui form" action="register.php" method="post">
                    <h4 class="ui dividing header">User Information</h4>
                    <div class="field">
                        <label>Name</label>
                        <div class="two fields">
                            <div class="field">
                                <input required="required"  type="text" name="firstname" placeholder="First Name" pattern="[a-zA-Z]+">
                            </div>
                            <div class="field">
                                <input required="required"  type="text" name="lastname" placeholder="Last Name" pattern="[a-zA-Z]+">
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Phone Number</label>
                        <div class="fields">
                            <div class="sixteen wide field">
                                <input required="required"  type="tel" name="phone" placeholder="Phone Number" pattern= "[0-9]">
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Address</label>
                        <div class="fields">
                            <div class="sixteen wide field">
                                <input required="required"  type="text" name="address" placeholder="Street Address">
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Location</label>
                        <div class="ui fluid search selection dropdown">
                            <input required="required"  type="hidden" name="country" readonly="readonly">
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
                            <input required="required"  type="hidden" name="gender">
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
                            <input required="required"  type="hidden" name="services" readonly="readonly">
                            <i class="dropdown icon"></i>
                            <div class="default text">Select Services</div>
                            <div class="menu">
                                <div class="item" data-value="Agent">Agent</div>
                                <div class="item" data-value="Consultant">Consultant</div>
                                <div class="item" data-value="Insturctor">Insturctor</div>
                                <div class="item" data-value="Home">Home and Office</div>
                                <div class="item" data-value="Lifestyle">Lifestyle</div>
                                <div class="item" data-value="ITTechnician">IT Technician</div>
                            </div>
                        </div>
                    </div>
                    
                    <h4 class="ui dividing header">Login Information</h4>
                        <div class="field">
                            <input required="required"  type="email" name="email" placeholder="E-mail address">
                        </div>
                        <div class="field">
                            <input required="required" class="password" type="password" name="password" placeholder="Password">
                        </div>
                        <div class="field">
                            <input required="required" class="confirmPassword" type="password" placeholder="Confirm Password">
                            <div class="password-error ui pointing red basic label" style="display: none;">
                              Password does not match the confirm password.
                            </div>
                        </div>
                    <button class="fluid ui primary button disabled" type="submit" name="submit">Register</button>
                </form>
                <script>
                    $('.tab.segment.user.active input.confirmPassword').blur(function(){
                        var password = $('.tab.segment.user.active input.password').val();
                        var confirmPassword = $('.tab.segment.user.active input.confirmPassword').val();

                        if(password === confirmPassword){
                            $('.tab.segment.user.active input.confirmPassword').parents("field").removeClass("error");
                            $('.tab.segment.user.active button[type=submit]').removeClass("disabled");
                            $('.tab.segment.user.active .password-error').fadeOut();
                        } else{
                            $('.tab.segment.user.active input.confirmPassword').parents("field").addClass("error");
                            $('.tab.segment.user.active button[type=submit]').addClass("disabled");
                            $('.tab.segment.user.active .password-error').fadeIn();
                        }
                    });
                </script>
            </div>
			
			<div class="ui bottom attached tab segment company" data-tab="comregister">
                <form class="ui form" action="register_company.php" method="post">
                    <h4 class="ui dividing header">Company Information</h4>
                    <div class="field">
                        <label>SSM Account</label>
                        <div class="fields">
                            <div class="sixteen wide field">
                                <input required="required"  type="text" name="Acc" placeholder="Acc SSM">
                            </div>
                        </div>
                    </div>
					<div class="field">
                        <label>Company Name</label>
                        <div class="fields">
                            <div class="sixteen wide field">
                                <input required="required"  type="tel" name="name" placeholder="Company Name">
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Phone Number</label>
                        <div class="fields">
                            <div class="sixteen wide field">
                                <input required="required"  type="tel" name="phone" placeholder="Phone Number" pattern= "[0-9]">
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Address</label>
                        <div class="fields">
                            <div class="sixteen wide field">
                                <input required="required"  type="text" name="address" placeholder="Street Address">
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Location</label>
                        <div class="ui fluid search selection dropdown">
                            <input required="required"  type="hidden" name="location" readonly="readonly">
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
                        <label>Services</label>
                        <div class="ui fluid search selection dropdown">
                            <input required="required"  type="hidden" name="services" readonly="readonly">
                            <i class="dropdown icon"></i>
                            <div class="default text">Select Services</div>
                            <div class="menu">
                                <div class="item" data-value="Agent">Agent</div>
                                <div class="item" data-value="Consultant">Consultant</div>
                                <div class="item" data-value="Insturctor">Insturctor</div>
                                <div class="item" data-value="Home">Home and Office</div>
                                <div class="item" data-value="Lifestyle">Lifestyle</div>
                                <div class="item" data-value="Technician">IT Technician</div>
                            </div>
                        </div>
                    </div>
                    <h4 class="ui dividing header">Login Information</h4>
                        <div class="field">
                            <input required="required" type="email" name="email" placeholder="E-mail address">
                        </div>
                        <div class="field">
                            <input required="required" class="password" type="password" name="password" placeholder="Password">
                        </div>
                        <div class="field">
                            <input required="required" class="confirmPassword" type="password" placeholder="Confirm Password">
                            <div class="password-error ui pointing red basic label" style="display: none;">
                              Password does not match the confirm password.
                            </div>
                        </div>
                    <button class="fluid ui primary button disabled" type="submit" name="submit">Register</button>
                </form>
                <script>

                    $('.tab.segment.company.active input.confirmPassword').blur(function(){
                        var password = $('.tab.segment.company.active input.password').val();
                        var confirmPassword = $('.tab.segment.company.active input.confirmPassword').val();

                        if(password === confirmPassword){
                            $('.tab.segment.company.active input.confirmPassword').parent("div").removeClass("error");
                            $('.tab.segment.company.active button[type=submit]').removeClass("disabled");
                            $('.tab.segment.company.active .password-error').fadeOut();
                        } else{
                            $('.tab.segment.company.active input.confirmPassword').parent("div").addClass("error");
                            $('.tab.segment.company.active button[type=submit]').addClass("disabled");
                            $('.tab.segment.company.active .password-error').fadeIn();
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>
<script type="application/javascript" src="js/semantic.min.js"></script>
<script type="application/javascript" src="js/slider.min.js"></script>
<script type="application/javascript" src="js/main.js"></script>
</body>
</html>