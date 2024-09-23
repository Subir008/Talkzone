<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>

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


    <div class="container top-section search-box">
        <h2 >Search Result For : <span id="search-value"></span></h2>
        <div class="row result-box row-cols-1  g-4 mt-3">
        </div>
    </div>

    <!-- Add Footer Part -->
    <?php
    include("components/footer.php");
    ?>
</body>

</html>