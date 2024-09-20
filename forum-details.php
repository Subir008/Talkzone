<?php
include("db/db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <title>Forum Details</title>
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

    <!-- Fetching the forum details based on id -->
    <?php
    $id = $_GET['id'];
    $query = "SELECT * FROM forum WHERE forum_id =  '$id ' ";
    $dataget = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($dataget);
    ?>

    <div class="container top-section">
        <div class="p-5 mb-4 bg-light rounded-3 inner-top-section ">
            <div class="container-fluid ">
                <?php
                if ($row['forum_img'] != "") {
                    ?>
                    <img src="image/java.jpg" class="forum-img" alt="...">
                    <?php
                }
                ?>
                <h1 class="display-5 fw-bold"><?php echo $row['heading'] ?></h1>
                <p class="col-md-12 fs-4"><?php echo $row['details'] ?></p>

            </div>
        </div>
        
        <h2 class="my-3">Add Your Comments Here</h2>
        <div class="container">
            <?php
            if (isset($_SESSION['login']) && $_SESSION['login'] == "Yes") {
                ?>
            <div class="mb-3">
                <input type="hidden" name="forum_id" id="forum_id" value="<?php echo $id ?>">
                <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id'] ?>">
                <label for="comment" class="form-label">Type Your Comment</label>
                <textarea class="form-control" id="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" id="comment-submit">Submit</button>
            <?php
            }else{
                ?>
            <p>Please Log In To Add Comment</p>
            <?php
            }
            ?>
        </div>

        <h2 class="my-4">Read All The Comments</h2>
        <div class="container-fluid">
            <div class="card mb-3" id="comment-box" style="">                
            </div>
        </div>

    </div>

    <!-- Toaster Start -->
    <div class="position-fixed bottom-0 end-1 me-2" style="z-index: 9999; opacity: 99; left:10px; bottom: 13px !important;">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body p-4" id="toast-body">
            </div>
        </div>
    </div>
    <!-- Toaster End -->

    <?php
    include("components/footer.php");
    ?>

</body>

</html>