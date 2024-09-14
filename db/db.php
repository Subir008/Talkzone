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

?>