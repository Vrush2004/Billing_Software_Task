<?php
    $con = new mysqli('localhost','root','','curdoperations','3307');

    if(!$con){
        die('Connection Failed:'.mysqli_connect_error());
    }
?>