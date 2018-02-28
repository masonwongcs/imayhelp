
$(document).ready(function () {
    // Semantic UI inititalization
    $('.ui.dropdown').dropdown();
    $('.slider').glide();

    $('.menu .item').tab();

    $('input[name="location"]').on('change', function(){
        var selection = $(this).val();
        loadAreaByState(parseInt(selection));
    });

    var userid = $('#currentSession').data('current-user');

    if(userid === undefined){
        $('.listing-item .like-count').addClass('disable');
    }

    //Check if not mobile 
    if( !(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) ) {
        $('.view-selection .card-view').removeClass('active');
        $('.view-selection .list-view').addClass('active');

        $('.listing-content .stackable').addClass('items').removeClass('cards');
        $('.listing-content .listing-item').addClass('item').removeClass('card');

        $('.like-count').attr("data-position", "bottom right");
    }

    toogleViewSelection();
    parseSearch();

    $('.listing-content .listing-item i.like').click(function () {
        var currentLike = Number($(this).siblings('.amount').text());
        var postid = $(this).data('services-id');
        var userid = $('#currentSession').data('current-user');
        if ($(this).hasClass('active')) {
            // Unlike post
            $(this).siblings('.amount').text(currentLike - 1);
            $.ajax({
                url: 'index.php',
                type: 'post',
                data: {
                    'unliked': 1,
                    'postid': postid,
                    'userid': userid
                },
                success: function(response){
                   
                }
            });

        } else {
            // Like the post
            $(this).siblings('.amount').text(currentLike + 1);
            $.ajax({
                url: 'index.php',
                type: 'post',
                data: {
                    'liked': 1,
                    'postid': postid,
                    'userid': userid
                },
                success: function(response){
                    
                }
            });
        }
        $(this).toggleClass('active');
    });

    $('.button.delete.post').click(function(){


        //At here $this is $('.button.delete.post')
        var postId = $(this).data('id');
        //that is to differentiate this selection and child selection
        //When parse $(this) to child in next function
        var that = $(this);

        $('.ui.delete.modal').modal({
            //choice given
                onDeny    : function(){
                    return;
            },
            onApprove : function() {
                //$(this) will become $('.ui.delete.modal')
                //Only call this function when user click ok
                return deletePost(postId, that); 
            }
          })
          .modal('show');
    })

    //perform action delete
    function deletePost(postId, that) { 
        $.ajax({
            url: 'deletePost.php?services_id=' + postId,
            type: 'get',
            success: function(response){
            }
        });

        that.parents("tr").remove();
    }

    // THis function will toggle view (List view or Card view) / switch view mode
    function toogleViewSelection(){
        $('.view-selection .button').click(function(){
            $(this).addClass('active');
            $('.view-selection .button').not($(this)).removeClass('active');

            if($(this).hasClass('list-view')){
                $('.like-count').attr("data-position", "bottom right");
                if(!($('.listing-content .stackable').hasClass('items'))){
                    $('.listing-content .stackable').addClass('items').removeClass('cards');
                }
                if(!($('.listing-content .listing-item').hasClass('item'))){
                    $('.listing-content .listing-item').addClass('item').removeClass('card');
                }
            } else if($(this).hasClass('card-view')){
                $('.like-count').attr("data-position", "top left");
                if(!($('.listing-content .stackable').hasClass('cards'))){
                    $('.listing-content .stackable').addClass('cards').removeClass('items');
                }
                if(!($('.listing-content .listing-item').hasClass('card'))){
                    $('.listing-content .listing-item').addClass('card').removeClass('item');
                }
            }
        });
    };

    // This function will get the area code and load based on it 
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

    // This function will get the text from input and parse to search.php to search it
    function parseSearch(){
        $('#search').keypress(function(e) {
            if(e.which == 13) {
                location.href = "search.php?search=" + $(this).val() + "&page=1";
            }
        });
    };
});