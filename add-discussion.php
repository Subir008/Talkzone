
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

        $split_filename = explode('.', $filename);

        $name = $split_filename[0];
        // echo $name;

        // Store the uploaded file extension
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        $new_name = $name . "_" . $curentdate . "." . $extension;

        // Check the uploaded extension is present in the allowed extension or not
        if (in_array($extension, $allowed_extension)) {
            $path = "image/thread-img/" . $new_name;
            if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
                echo "Image Uploaded Successfully";
                echo "<br>";
                $file_upload = true;
            } else {
                echo 'ERROR Uploading File';
                echo "<br>";
            }
        } else {
            echo 'ERROR: File extension not allowed.';
            echo "<br>";
        }
    }else{
        echo 'ERROR: No file selected';
        echo "<br>";
    }

    // Storing file name as null if file is not upload by user
    if ($file_upload == false) {
        $new_name = NULL;
    }

    $userId = $_POST['user_id'];
    $title = $_POST['discussion-title'];
    $details = $_POST['discussion-details'];

    $title = str_replace("<" , "&lt;" , $title);
    $title = str_replace(">" , "&gt;" , $title);
    $title = str_replace("\"" , "&quot;" , $title);
    $title = str_replace("\'" , "&apos;" , $title);
    $title = str_replace("\\" , "&frasl;" , $title);

    $details = str_replace("<", "&lt;", $details);
    $details = str_replace(">", "&gt;" , $details);
    $details = str_replace("\'", "&apos;" , $details);
    $details = str_replace("\"", "&quot;" , $details);
    $details = str_replace("=", "&equals;" , $details); 
    $details = str_replace(",", "&comma;" , $details); 

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
                                     '" . $new_name . "',
                                     '" . $timestamp . "' 
                                     )";

    $result = mysqli_query($con, $query);

    if ($result) {
        echo "Discussion Added Successfully";
    } else {
        echo "Error Adding Discussion";
    }

}



?>