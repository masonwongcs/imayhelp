<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/semantic.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/slider.css">
    <title>Service Listing</title>
</head>
<body>
<div class="container">
    <div class="wrapper">
        <?php include 'header.php';?>
        <?php
            include ('connection.php');

            if (isset($_GET['serviceId'])) {

                $serviceId = $_GET['serviceId'];
                if($serviceId == ""){
                    echo "
                        <script type=\"text/javascript\">
                            location.href = \"error.php\";
                        </script>
                    ";
                }
                $query = "SELECT * FROM `post` WHERE services_id = '$serviceId'";
                $result = mysqli_query($link, $query);
                while($row = mysqli_fetch_array($result, MYSQLI_NUM))
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
                }

                //Get current user information
                $queryUser = "SELECT * FROM `register_user` WHERE user_id = '$userId'";
                $resultUser = mysqli_query($link, $queryUser);
                while($rowUser = mysqli_fetch_array($resultUser, MYSQLI_NUM))
                {
                  // $userId = $rowUser[0];
                  $firstName_listing = $rowUser[1];
                  $lastName_listing = $rowUser[2];
                  $email_listing = $rowUser[3];
                  // $pwd = $rowUser[4];
                  // $mobileNo = $rowUser[5];
                  // $address = $rowUser[6];
                  // $country = $rowUser[7];
                  // $gender = $rowUser[8];
                  // $acc_SSM = $rowUser[9];
                  $company_name_listing = $rowUser[10];
                  // $service = $rowUser[11];
                } 

                if($firstName_listing != "" || $lastName_listing != ""){
                    $displayName_listing = $firstName_listing . " " . $lastName_listing;
                } else {
                    $displayName_listing = $company_name_listing;
                }

                if($email_listing != $_SESSION['email']){
                    header ("location:error.php");
                }

            } else {
                // Fallback behaviour goes here
               echo "
                    <script type=\"text/javascript\">
                        location.href = \"error.php\";
                    </script>
                ";
            }
        ?>
        <div class="ui grid">
            <div class="ten wide column posting-wrapper">
                <div class="ui segment">
                    <form id="postForm" class="ui form" action="updateListing.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="postForm" name="<?php echo ini_get("session.upload_progress.name"); ?>">
                        <input type="hidden" value="<?php echo $serviceId; ?>" name="service-id">
                        <div class="field">
                            <label>Service Title</label>
                            <input type="text" name="service-name" placeholder="Service Title" required="required" value="<?php echo $serviceName; ?>">
                        </div>
						<div class="field">
                            <label>Image</label>
                            <div class="upload-preview-wrapper">
                                <div class="ui fluid image">
                                  <img class="upload-preview" src="<?php echo $imageLocation;?>">
                                </div>
                            </div>
                        </div>
						
                        <div class="field">
                            <label>Description</label>
                            <textarea name="desc"><?php echo $description; ?></textarea>
                        </div>
                        <div class="field">
                            <label>Location</label>
                            <div class="ui fluid search selection dropdown">
                                <input type="hidden" name="location" readonly="readonly" value="/<?php echo $location; ?>">
                                <i class="dropdown icon"></i>
                                <div class="default text">Please choose your service area location.</div>
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
                            <label>Area</label>
                            <div class="ui fluid search selection dropdown area"> 
                                <input type="hidden" name="area" readonly="readonly" value="<?php echo $area; ?>">
                                <i class="dropdown icon"></i>
                                <div class="default text">Please choose your service area.</div>
                                <div class="menu">
                                    <div class="item" data-value="cat1">Please choose your service location.</div>
                                </div>
                            </div>
                        </div>
						
                        <div class="field">
                            <label>Price(MYR)</label>
                            <input type="text" name="price" placeholder="Price" required="required" value="<?php echo $price; ?>">
                        </div>
                        <div class="field">
                            <label>Contact</label>
                            <input type="tel" name="contactno" placeholder="Phone Number" required="required" value="<?php echo $contact; ?>">
                        </div>
                        <div class="ui indicating progress" id="progress">
                          <div class="bar"></div>
                        </div>
                        <button class="ui primary button" type="submit" name="submit">Update</button>
                    </form>
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
<script>
    loadAreaByState('<?php echo $location; ?>');

    $('.ui.form').form({
        fields: {
          fileInput:{
            identifier: 'name',
            rules: [
              {
                type : 'empty'
              }
            ]
          }
        }
    });
    function readURL(input) {

        var MAX_FILE_SIZE = 1048576;
        if(input.files[0].size <= MAX_FILE_SIZE){
         if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
              $('.upload-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
          }
          return true;
        } else{
            alert('Max file size is 1MB');
            $('.ui.form').form('reset');
            $('.upload-preview-wrapper').slideUp();
            return false;
        }
    }

    function loadAreaByState(areaCode){

        var areaCodeMap = {
            1: ['Kuala Lumpur', 'Putrajaya'],
            2: ['Johor Bahru', 'Batu Pahat'],
            3: ['Alor Setar', 'Sungai Petani'],
            4: ['Jeli', 'Kota Bharu'],
            5: ['Alor Gajah', 'Masjid Tanah'],
            6: ['Seremban', 'Tampin'],
            7: ['Bandar Pusat Jengka', "Genting Highland"],
            8: ['Georgetown', 'Balik Pulau'],
            9: ['Ipoh', 'Kampar'],
            10: ['Kuala Perlis', 'Padang Besar'],
            11: ['Putajaya'],
            12: ['Bandar Kinrara', 'Bandar Sunway'],
            13: ['Kota Kinabalu', 'Kota Kinabatangan'],
            14: ['Bintulu', 'Kapit'],
            15: ['Hulu Terenggana', 'Kuala Terengganu']
        }

        $('.ui.dropdown.area').dropdown({
            values: [
              {
                name: areaCodeMap[areaCode][0],
                value: areaCodeMap[areaCode] + 1
              },
              {
                name     :areaCodeMap[areaCode][1],
                value    : areaCodeMap[areaCode] + 2
              }
            ]
          });


    };
     

    $("#upload").change(function() {
      if(readURL(this)){
        $('.upload-preview-wrapper').slideDown();
      }
    });

    $('button[name=submit]').click(function(e){
        var submitable = true;
        $('input[required]').each(function(k,i){
            if($(this).val() === ""){
                submitable = false;
            }
            if($(this).is(':checkbox')){
                if (!$(this).is(':checked')) {
                    // if not checked
                    submitable = false;
                }
            }
        })

        if(submitable){
            $(this).addClass('disabled');
            $(this).html('<div class="ui active mini inline inverted loader"></div>');
            $('#progress').fadeIn();
            $('#progress').progress({
              percent: 100
            });
        }
    });

</script>
</body>
</html>