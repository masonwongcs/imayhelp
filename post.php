<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/semantic.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/slider.css">
    <title>View Post</title>
</head>
<body>
<div class="container">
    <div class="wrapper">
        <?php include 'header.php';?>
        <div class="ui grid">
            <div class="ten wide column posting-wrapper">
                <div class="ui segment">
                    <form id="postForm" class="ui form" action="submitpost.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="postForm" name="<?php echo ini_get("session.upload_progress.name"); ?>">
                        <div class="field">
                            <label>Service Title</label>
                            <input type="text" name="service-name" placeholder="Service Title" required="required">
                        </div>
						<div class="field">
                            <label>Image</label>
                            <input type="hidden" name="MAX_FILE_SIZE" value="1048576" /> 
                            <input type="file" name="upload" id="upload" placeholder="Upload an image" required="required">
                            <div class="hide upload-preview-wrapper">
                                <div class="ui fluid image">
                                  <img class="upload-preview" src="#">
                                </div>
                            </div>
                        </div>
						
                        <div class="field">
                            <label>Description</label>
                            <textarea name="desc" required="required"></textarea>
                        </div>
                        <div class="field">
                            <label>Location</label>
                            <div class="ui fluid search selection dropdown">
                                <input type="hidden" name="location" readonly="readonly" required="required">
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
                                <input type="hidden" name="area" readonly="readonly" required="required">
                                <i class="dropdown icon"></i>
                                <div class="default text">Please choose your service area.</div>
                                <div class="menu">
                                    <div class="item" data-value="cat1">Please choose your service location.</div>
                                </div>
                            </div>
                        </div>
						
                        <div class="field">
                            <label>Price(MYR)</label>
                            <input type="text" name="price" placeholder="Price" required="required">
                        </div>
                        <div class="field">
                            <label>Contact</label>
                            <input type="tel" name="contactno" placeholder="012345678" required="required">
                        </div>
                        <div class="field">
                            <div class="ui checkbox">
                                <input type="checkbox" tabindex="0" required="required">
                                <label>I agree to the Terms and Conditions</label>
                            </div>
                        </div>
                        <div class="ui indicating progress" id="progress">
                          <div class="bar"></div>
                        </div>
                        <button class="ui primary button" type="submit" name="submit">Submit</button>
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

    $('.ui.form').form({
        fields: {
          name: 'empty',
          location: 'empty',
          area: 'empty'
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

        $('.dropdown input[type=hidden]').each(function(){
            if($(this).val() === "" || $(this).val() === "/1" ){
                submitable = false;
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