<?php
    include ("db/db.php");
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $contact = $_POST['contact'];
        $password = $_POST['password'];
        $contact_query = mysqli_query($con , "SELECT user_contact , user_password FROM user_master WHERE user_contact = '". $contact . "' ") ;
        if (mysqli_num_rows($contact_query) > 0){
            
        }else{
            echo "Invalid Contact";
        }

    }
?>