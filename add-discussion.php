<?php
    include ("db/db.php");

    // Checking the request method
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $userId = $_POST['userId'];
        $title = $_POST['discussiontitle'];
        $details = $_POST['discussiondetails'];   

        $query = "INSERT INTO `forum` (
                                     `heading`,
                                     `details`,
                                     `user_id`,
                                     `entry_timestamp`) 
                                     VALUES (
                                     '".$title."',
                                     '".$details."',
                                     '".$userId."',
                                     '".$timestamp."' 
                                     )";

        $result = mysqli_query($con , $query);

    }
?>