<?php

include("db/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Fetching the data 
    $user_id = $_POST['user_id'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $dataget = mysqli_query($con, "SELECT user_password FROM user_master WHERE user_id = '" . $user_id . "'");
    $row = mysqli_fetch_assoc($dataget);

    $db_password = $row['user_password'];

    // $hashCurrentPassword = password_hash($current_password, PASSWORD_DEFAULT);
    $hashNewPassword = password_hash($new_password, PASSWORD_DEFAULT);

    if (password_verify($current_password, $db_password)) {
        if ($new_password == $confirm_password) {
            $update = mysqli_query($con, "UPDATE user_master SET user_password = '" . $hashNewPassword . "' WHERE user_id = '" . $user_id . "'");
            if ($update) {
                echo "Password updated successfully";
            } else {
                echo "Error updating password";
            }
        }else{
            echo "New Password and Confirm Password do not match";
        }
    } else {
        echo "Invalid Current Password";
    }
}
?>