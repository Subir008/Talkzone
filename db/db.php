<?php

    // Database Credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "talkzone";

    // Connection to Database
    $con = mysqli_connect($servername , $username , $password , $database);

    // Checking the connection status
    if(!$con){
        echo "Connection Could't Established Due to : " . mysqli_connect_error();
    }

    $timestamp = date("Y-m-d H:i:s"); 
    $curentdate = date('d-m-Y');

    // Allowed file with extension name
    $allowed_extension = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG', 'gif', 'webp', 'tiff', 'tif');
    $inputAllowedImage = '.jpg,.JPG,.jpeg,.JPEG,.png,.PNG,.gif,.webp,.tiff,.tif';

?>