<?php
include("db/db.php");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>

<!-- Add Header Files -->
<?php
include("components/header.php");
?>

<!-- Loader Start -->
 <div class="loader-wrapper">
     <div class="loader"></div> 
 </div>
<!-- Loader End -->

<!-- Toaster Start -->
<div class="position-fixed bottom-0 end-1 me-2" style="z-index: 9999; opacity: 99; left:10px">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body p-4" id="toast-body">
        </div>
    </div>
</div>
<!-- Toaster End -->


<footer class="footer mt-auto py-3 bg-dark">
    <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/e1275c01b3.js" crossorigin="anonymous"></script>
<script src="signup.js"></script>

</body>

</html>