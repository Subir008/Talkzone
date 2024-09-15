<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Discussion</title>

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

    <div class="container top-section">
        <div class="row d-flex justify-content-center ">
        <div class="col-9 ">
        <h2 class="text-center">Start New Discussion</h2>
        <form>
            <div class="mb-3">
                <label for="discussion-title" class="form-label">Discussion Title</label>
                <input type="text" class="form-control" id="discussion-title" aria-describedby="">
            </div>
            <div class="mb-3">
                <label for="discussion-details" class="form-label">Discussion Details</label>
                <textarea class="form-control" id="discussion-details" rows="4"></textarea>
            </div>
            <div class="mb-3">
                <label for="discussion-img" class="form-label">Discussion Image</label>
                <input type="file" class="form-control" id="discussion-img" aria-describedby="">
            </div>
            <div class="mb-3 pt-4 text-center ">
                <button type="submit" class="btn btn-primary col-5" id="signup">Submit</button>
            </div>
        </form>
        </div>
        </div>
    </div>

    <?php
    include("components/footer.php");
    ?>
</body>

</html>