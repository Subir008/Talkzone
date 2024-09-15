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

            <div class="col-md-4 d-flex gap-3">
                <div class="image-section">
                    <img src="image/img.jpg" alt="" class="profile-img text-center">
                    <h5 class="fw-bold text-center mt-2">Full Name</h5>
                    <p class="text-center">test@test.com</p>
                </div>
                <div class="divider"></div>
            </div>

            <div class="col-md-8 px-5">
                <h3>My Profile</h3>
                <br>
                <h5>Personal Information</h5>
                <hr>
                <form id="personal_info" class="pb-5">
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" aria-describedby=""
                            autocomplete="off" required placeholder="Enter Your Full Name">
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
                        <label for="gender" class="form-label">Select Gender</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male"
                                value="male">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female"
                                value="female">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="others"
                                value="others">
                            <label class="form-check-label" for="others">Others</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="address" autocomplete="off"
                            placeholder="Enter Your Address " rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Profile Image</label>
                        <input type="file" class="form-control" id="profile_img" name="profile_img" aria-describedby="emailHelp"
                            autocomplete="off">
                    </div>
                    <div class="mb-3 mt-4 text-center d-flex justify-content-end">
                        <button type="submit" class="btn btn-success col-5" id="signup">Save Changes</button>
                    </div>
                </form>

                <h5 class="mt-5">Update Password</h5>
                <hr>

                <form id="signupform">
                    <div class="mb-3">
                        <label for="contact" class="form-label">Current Password</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" aria-describedby=""
                            autocomplete="off" required placeholder="Enter Your Name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">New Password</label>
                        <input type="email" class="form-control" id="email" name="email" autocomplete="off"
                            placeholder="Enter Your Email Here">
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Confirm Password</label>
                        <input type="tel" class="form-control" id="contact" name="contact" aria-describedby="emailHelp"
                            autocomplete="off" required placeholder="Enter Your Contact Here" pattern="[0-9]{10}">
                    </div>
                    <div class="mb-3 mt-4 text-center d-flex justify-content-end">
                        <button type="submit" class="btn btn-success col-5   " id="signup">Change Password</button>
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