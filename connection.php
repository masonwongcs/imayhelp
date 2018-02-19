<?php 
//connection to mySQL
$link = mysqli_connect("localhost", "root", "", "")
        or die("Could not connect");
$db = mysqli_select_db($link,"services")or die("Could not connect");
?>
