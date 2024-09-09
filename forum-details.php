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

    <div class="container top-section">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Custom jumbotron</h1>
                <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one
                    in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it
                    to your liking.</p>
                <button class="btn btn-primary btn-lg" type="button">Example button</button>
            </div>
        </div>

      

        <div class="container-fluid">
            <div class="card mb-3" style="">
                <h2>Comments</h2>
                <div class="row g-0">
                    <div class="col-md-1 text-center comment-user">
                        <i class="fa-solid fa-circle-user fa-2x"></i>
                    </div>
                    <div class="col-md-11">
                        <div class="card-body card-details">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-md-1 text-center comment-user">
                        <i class="fa-solid fa-circle-user fa-2x"></i>
                    </div>
                    <div class="col-md-11">
                        <div class="card-body card-details">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-md-1 text-center comment-user">
                        <i class="fa-solid fa-circle-user fa-2x"></i>
                    </div>
                    <div class="col-md-11">
                        <div class="card-body card-details">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-md-1 text-center comment-user">
                        <i class="fa-solid fa-circle-user fa-2x"></i>
                    </div>
                    <div class="col-md-11">
                        <div class="card-body card-details">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <?php
    include("components/footer.php");
    ?>

</body>

</html>