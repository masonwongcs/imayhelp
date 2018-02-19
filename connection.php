<?php 
//connection to mySQL
$link = mysqli_connect('sql213.epizy.com', 'epiz_21475618', 'zKBsXEXSGcj2', 'epiz_21475618_services')
        or die("Could not connect");
$db = mysqli_select_db($link,"services")or die("Could not connect");
?>
