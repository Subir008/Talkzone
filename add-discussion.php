<?php
include("db/db.php");

// // Checking the request method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Storing file upload value as false
    $file_upload = false;

    // Check image file is uploaded or not
    if ($_FILES['file']['name'] != "") {

        // Store the uploaded file name
        $filename = $_FILES['file']['name'];

        // Store the uploaded file extension
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        // Allowed file with extension name
        $allowed_extension = array('png', 'jpg', 'jpeg');

        // Check the uploaded extension is present in the allowed extension or not
        if (in_array($extension, $allowed_extension)) {
            // $new_name = $filename . "." . $extension;
            $path = "image/thread-img/" . $filename;
            if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
                echo "Image Uploaded Successfully";
                echo "<br>";
                $file_upload = true;
            }
        } else {
            echo 'ERROR Uploading File';
            echo "<br>";
        }
    }

    // Storing file name as null if file is not upload by user
    if ($file_upload == false) {
        $filename = NULL;
    }

    $userId = $_POST['user_id'];
    $title = $_POST['discussion-title'];
    $details = $_POST['discussion-details'];

    $query = "INSERT INTO `forum` (
                                     `heading`,
                                     `details`,
                                     `user_id`,
                                     `forum_img`,
                                     `entry_timestamp`) 
                                     VALUES (
                                     '" . $title . "',
                                     '" . $details . "',
                                     '" . $userId . "',
                                     '" . $filename . "',
                                     '" . $timestamp . "' 
                                     )";

    $result = mysqli_query($con, $query);

    if($result){
        echo "Discussion Added Successfully";
    }else{
        echo "Error Adding Discussion";
    }

}



?>