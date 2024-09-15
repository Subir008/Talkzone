<?php
include("db/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
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
        <div class="row">
            
            <div class="col-md-4"></div>

            <div class="col-md-8">
                <h3>My Profile</h3>

				<h5>Personal Information</h5>
				<hr>
				<form id="signupform">
                    <!-- <form action="signup.php" method="post"> -->
                    <div class="mb-3">
                        <label for="contact" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" aria-describedby=""
                            autocomplete="off" required placeholder="Enter Your Name" >
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" autocomplete="off"
                             placeholder="Enter Your Email Here">
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact Number</label>
                        <input type="tel" class="form-control" id="contact" name="contact" aria-describedby="emailHelp"
                            autocomplete="off" required placeholder="Enter Your Contact Here" pattern="[0-9]{10}">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Gender</label>
                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword"
                            autocomplete="off" required placeholder="Confirm Your Password ">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="address"
                            autocomplete="off" placeholder="Enter Your Address "></textarea>
                    </div>
                    <div class="mb-3 text-center">
                        
                        <button type="submit" class="btn btn-success col-5" id="signup">Save Changes</button>
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