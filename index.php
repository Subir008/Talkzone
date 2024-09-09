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

<!-- Carousel Start -->
<div id="carousel" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true"
      aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image/img.jpg" class="d-block carousel-img w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="image/img1.jpg" class="d-block carousel-img w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="image/img2.jpg" class="d-block carousel-img w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Carousel End -->

<div class="container forum-container">
  <h2 class="text-center fw-bold mb-3">Top Discusion</h2>
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php
    $query = "SELECT * FROM forum ";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
      $details = $row['details'];
      ?>
      <div class="col">
        <div class="card h-100">
          <?php
          if ($row['forum_img'] != "") {
            ?>
            <a href="forum-details.php">
              <!-- /id=<?php echo $row['forum_id'] ?> -->
              <img src="image/java.jpg" class="card-img-top" alt="...">
            </a>
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['heading'] ?></h5>
              <a href="forum-details.php">
                <!-- /id=<?php echo $row['forum_id'] ?> -->
                <p class="card-text"><?php echo substr($details, 0, 80) ?>........ </p>
              </a>
            </div>
            <?php
          } else {
            ?>
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['heading'] ?></h5>
              <a href="forum-details/id=<?php echo $row['forum_id'] ?>">
                <p class="card-text"><?php echo substr($details, 0, 220) ?>........ </p>
              </a>
            </div>
            <?php
          }
          ?>

        </div>
      </div>
      <?php
    }
    ?>
  </div>
</div>

<!-- Toaster Start -->
<div class="position-fixed bottom-0 end-1 me-2" style="z-index: 9999; opacity: 99; left:10px">
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