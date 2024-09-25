<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <link rel="icon" type="image/x-icon" href="image/logo.png">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <!-- Add Header Files -->
    <?php
    include("components/header.php");
    ?>

    <!-- Loader Start -->
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    <!-- Loader End -->

    <?php
        $comment_id = $_GET['id'];
        $query = "SELECT comment_master.comment_id , comment_master.comment_details , forum.heading , user_master.user_name
                        FROM comment_master 
                        LEFT JOIN forum ON forum.forum_id = comment_master.forum_id
                        LEFT JOIN user_master ON user_master.user_id = comment_master.user_id
                        WHERE comment_master.comment_id = {$comment_id}";

        $result = mysqli_query($con, $query);

        $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container top-section">
        <div class="p-5 mb-4 bg-light rounded-3 inner-top-section ">
            <div class="container-fluid ">
                <h1 class="display-5 fw-bold"><?php echo $row['heading'] ?></h1>
                <p class="col-md-12 fs-4 mt-5"><?php echo $row['comment_details'] ?></p>
                <br>
                <br>
                <p> <strong> Posted By: </strong> <?php echo $row['user_name'] ?></p>
            </div>
        </div>
        
        <h2 class="my-3">Add Your Reply Here</h2>
        <div class="container">
            <?php
            if (isset($_SESSION['login']) && $_SESSION['login'] == "Yes") {
                ?>
            <div class="mb-3">
                <input type="hidden" name="forum_id" id="forum_id" value="<?php echo $forum_id ?>">
                <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id'] ?>">
                <input type="hidden" name="comment_id" id="comment_id" value="<?php echo $row['comment_id'] ?>">
                <label for="comment" class="form-label">Type Your Reply</label>
                <textarea class="form-control" id="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" id="reply-submit">Submit</button>
            <?php
            }else{
                ?>
            <p>Please Log In To Add Reply</p>
            <?php
            }
            ?>
        </div>

        <h2 class="my-4">Read All The Reply</h2>
        <div class="container-fluid">
            <div class="card mb-3" style="">    
        <?php
            $reply_dataget = "SELECT 
                                reply_master.reply_details,
                                reply_master.entry_timestamp ,
                                user_master.user_name 
                                FROM reply_master 
                                LEFT JOIN user_master ON user_master.user_id = reply_master.user_id
                                WHERE reply_master.comment_id = '$comment_id'";
            
            $reply_data = mysqli_query($con , $reply_dataget);
            
            if(mysqli_num_rows($reply_data) > 0){
              
            while($row = mysqli_fetch_assoc($reply_data) ){
                ?>

            <div class='row g-0 px-2 comment-user'>
                <div class='col-md-1 col-sm-1 col-1 text-center '>
                    <i class='fa-solid fa-circle-user fa-2x'></i>
                </div>
                <div class='col-md-11 col-sm-11 col-11'>
                    <div class='card-body card-details'>
                        <h5 class='card-title'><?php echo $row["user_name"] ?> at <?php echo $row['entry_timestamp'] ?> </h5>
                        <p class='card-text'><?php echo $row["reply_details"] ?></p>
                    </div>
                </div>
            </div>            
            
            <?php
            }
        }else{
            ?>
                <p class="text-center" style="margin-left: 15px;margin-top: 15px;font-size: larger; font-weight: 500;">No Reply Found</p>
            <?php
        }
            ?>
            </div>
            </div>
    

    </div>


    <!-- Toaster Start -->
    <div class="position-fixed bottom-0 end-1 me-2"
        style="z-index: 9999; opacity: 99; left:10px; bottom: 13px !important;">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body p-4" id="toast-body">
            </div>
        </div>
    </div>
    <!-- Toaster End -->
    <!-- Footer Added -->
    <?php
    include("components/footer.php");
    ?>
</body>

</html>