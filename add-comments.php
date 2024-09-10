<?php
    include ("db/db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $comment = $_POST['comment'];
        $forum_id = $_POST['forum_id'];

        // echo "comment " . $comment;

        $query = "INSERT INTO `comment_master` ( 
                                        `comment_details`,
                                            `forum_id`,
                                            `user_id`,
                                            `entry_timestamp`) VALUES (
                                            '".$comment."',
                                            '".$forum_id."', 
                                            '', 
                                            '". $timestamp."')";

        $result = mysqli_query($con, $query);

        if($result){
            echo "Comment Added Successfully";
        }else{
            echo "Server Error";
        }
    }
?>