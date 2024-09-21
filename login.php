<?php
    include ("db/db.php");
    session_start();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $contact = $_POST['contact'];
        $password = $_POST['password'];

        $contact_query = mysqli_query($con , "SELECT user_contact ,user_id, user_name, user_password FROM user_master WHERE user_contact = '". $contact . "' ") ;
        $result = mysqli_fetch_assoc($contact_query);
        $db_password = $result['user_password'];

        if (mysqli_num_rows($contact_query) > 0){
            if(password_verify($password ,$db_password)){
                $_SESSION['user_contact'] = $result['user_contact'];
                $_SESSION['user_id'] = $result['user_id'];
                $_SESSION['user_name'] = $result['user_name'];
                $_SESSION['login'] = "Yes";

                echo "Login Successfull";

            }else{
                $_SESSION['login'] = "No";
                echo "Invalid Password";
            }
        }else{
            $_SESSION['login'] = "No";
            echo "Invalid Contact";
        }

    }
?>