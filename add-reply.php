<?php
    include ("db/db.php");
    $status = "";
    $message = "";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $comment = $_POST['comment'];
        $forum_id = $_POST['forum_id'];
        $user_id = $_POST['user_id'];
        $comment_id = $_POST['comment_id'];

        // echo "comment " . $comment;

        $query = "INSERT INTO `reply_master` ( 
                                `reply_details`,
                                `forum_id`,
                                `user_id`,
                                `comment_id`,
                                `entry_timestamp`) 
                         VALUES (
                                '".$comment."',
                                '".$forum_id."', 
                                '$user_id', 
                                '$comment_id', 
                                '". $timestamp."'
                                )";

        $result = mysqli_query($con, $query);

        if($result){
            $status = "Success";
            $message = "Reply Added Successfully";
        }else{
            $status = "Failed";
            $message = "Server Error";
        }
    }

    $response = [
        'status' => $status,
        'message' => $message
    ];

    echo json_encode($response);

?>