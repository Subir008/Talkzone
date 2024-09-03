<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("db/db.php");

    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $status = "";

    $user_check = "SELECT * FROM user_master WHERE user_contact ='". $contact ."'";

    $result = mysqli_query($con, $user_check);

    if (mysqli_num_rows($result) == 0) {
        if ($password == $confirmPassword) {
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            $add_user = "INSERT INTO `user_master` ( `user_contact`, `user_password`, `entry_timestamp`) 
            VALUES ( '".$contact."', '".$hashPassword."', '".$timestamp."')";
            $result = mysqli_query($con, $add_user);
            $status = "Data Inserted Successfully";
           echo $status;
        } else {
            $status = "Password Mismatched";
            echo $status;
        }
    } else {
        $status = "Phone Number Already registered";
        echo $status;
    }
}
?>