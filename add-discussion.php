
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

    $entities = array(
        "<" => "&lt;",
        ">" => "&gt;",
        "\"" => "&quot;",
        "'" => "&apos;",
        "/" => "&frasl;",
        "=" => "&equals;",
        "," => "&comma;",
        "?" => "&quest;",
        "!" => "&excl;",
        "+" => "&plus;",
        "\\" => "&Backslash;",
    );
    
    $title = strtr($title, $entities);
    $details = strtr($details, $entities);    


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