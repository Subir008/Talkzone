<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        include ("db/db.php");
        
        $contact = $_POST['contact'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        
        echo $password . "      " . $contact;
    }
?>