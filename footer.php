<div class="footer">
    <p>Copyright&nbsp;&copy;&nbsp;2018. All Rights Reserved</p>
</div>
<script>
    //Check if not mobile 
    if( !(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) ) {
        $('.view-selection .card-view').removeClass('active');
        $('.view-selection .list-view').addClass('active');

        $('.listing-content .stackable').addClass('items').removeClass('cards');
        $('.listing-content .listing-item').addClass('item').removeClass('card');
    }
</script>