<?php
    include ("db/db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Discussion</title>
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
    if ($_SESSION['login'] == "No" && $_SESSION['login'] == ""){
        header("Location: index.php");
        exit;
    }
    ?>

    <!-- Loader Start -->
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    <!-- Loader End -->

    <div class="container top-section">
        <div class="row d-flex justify-content-center ">
        <div class="col-9 ">
        <h2 class="text-center">Start New Discussion</h2>
        <form id="discussion-submit">
        <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id'] ?>">
            <div class="mb-3">
                <label for="discussion-title" class="form-label">Discussion Title</label>
                <input type="text" class="form-control" id="discussion-title" aria-describedby="" name="discussion-title">
            </div>
            <div class="mb-3">
                <label for="discussion-details" class="form-label">Discussion Details</label>
                <textarea class="form-control" id="discussion-details" rows="4" name="discussion-details"></textarea>
            </div>
            <div class="mb-3">
                <label for="discussion-img" class="form-label">Discussion Image</label>
                <input type="file" class="form-control" id="discussion-img" aria-describedby="" name="file" accept="<?php echo $inputAllowedImage ?>">
            </div>
            <div class="mb-3 pt-4 text-center ">
                <button type="submit" class="btn btn-primary col-5" >Submit</button>
            </div>
        </form>
        </div>
        </div>
    </div>

    <!-- Toaster For Image  -->
    <div class="position-fixed bottom-0 end-1 me-2" style="z-index: 9999; opacity: 99; left:10px; bottom: 130px !important;">
        <div id="liveToastImage" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body p-4" id="image-toast-body">
            </div>
        </div>
    </div>
    <!-- Toaster End -->

    <!-- Toaster For Data  -->
    <div class="position-fixed bottom-0 end-1 me-2" style="z-index: 9999; opacity: 99; left:10px; bottom: 13px !important;">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body p-4" id="toast-body">
            </div>
        </div>
    </div>
    <!-- Toaster End -->

    <div class="footer">
        <?php
    include("components/footer.php");
    ?>
    </div>
    <script src="js/discussion.js"></script>
</body>

</html>