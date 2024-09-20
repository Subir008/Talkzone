<?php
    include ("db/db.php");

    // Checking the request method
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // Storing file upload value as false
        $file_upload = false;

        // Check image file is uploaded or not
        if($_FILES['profile_img']['name'] != ""){

            //Store upload file name
            $filename = $_FILES['profile_img']['name'];

            //Split the upload file name
            $split_filename = explode('.' , $filename);

            // Store the file name without extension
            $name = $split_filename[0];

            // Store the uploaded file extension
            $extension = pathinfo($filename ,PATHINFO_EXTENSION);

            // Create new file name
            $new_name = 'profile_img_' . $name . '_' . $curentdate . '.' . $extension;

            // Check the uploaded extension is present in the allowed extension or not
            if(in_array($extension , $allowed_extension)){

                //Adding the file upload path
                $path = "image/profile-img/" .$new_name;

                // Uploading the file
                if(move_uploaded_file($_FILES['profile_img']['tmp_name'], $path)){
                    
                    echo "Image Uploaded Successfully";
                    echo "<br>";
                    $file_upload = true;

                }else{
                    echo "Error in Uploading Image";
                    echo "<br>";
                }

            }else{
                echo "Invalid file extension";
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

    $user_id = $_POST['user_id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    // Update query for updating all the datas
    $query = "UPDATE user_master SET
                                `user_name` = '".$full_name."',
                                `user_email` = '".$email."',
                                `gender` = '".$gender."',
                                `address` = '".$address."',
                                `profile_img` = '".$new_name."',
                                `update_timestamp` = '".$timestamp."'
                                WHERE `user_id` = '".$user_id."'";

    // echo $query; 
    $result = mysqli_query($con, $query);

    // Check data is updated or not
    if($result){
        echo "Data Updated Successfully";
    }else{
        echo "Error in Updating Data";
    }
                                      
    }
?>