<?php
include("db/db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="image/logo.png">
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

    <?php
    $id = $_SESSION['user_id'];
    $query = "SELECT * FROM user_master WHERE user_id = '$id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $username = $row['user_name'];
    $useremail = $row['user_email'];
    $gender = $row['gender'];
    $address = $row['address'];
    $profile_img = $row['profile_img'];
    ?>

    <div class="container top-section pb-0">
        <div class="row">

            <div class="col-md-4 d-flex gap-3">
                <div class="image-section">
                    <?php
                        if ($profile_img != ""){
                            echo "<img src='image/profile-img/".$profile_img."' class='profile-img text-center' alt='Profile Image' >";
                        }else{
                            echo "<img src='image/img.jpg' class='profile-img text-center' alt='Profile Image '> ";
                        }
                    ?>
                    <!-- <img src="image/img.jpg" alt="" class="profile-img text-center"> -->
                    <h5 class="fw-bold text-center mt-2"><?php echo ($username != "") ? $username : "Full Name" ?></h5>
                    <p class="text-center"><?php echo ($useremail != "") ? $useremail : "demo@demo.com" ?></p>
                </div>
                <div class="divider"></div>
            </div>

            <div class="col-md-8 px-5">
                <h2>My Profile</h2>
                <br>
                <h4>Personal Information</h4>
                <hr>
                <form id="personal_info" class="pb-5">
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" aria-describedby=""
                            autocomplete="off" required placeholder="Enter Your Full Name"
                            value="<?php echo $username ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" autocomplete="off"
                            placeholder="Enter Your Email Here" value="<?php echo $useremail ?>">
                    </div>
                    <div class="mb-3">
                        <label for="update_contact" class="form-label">Contact Number</label>
                        <input type="tel" class="form-control" id="update_contact" name="update_contact"
                            aria-describedby="emailHelp" autocomplete="off" required
                            placeholder="Enter Your Contact Here" pattern="[0-9]{10}" readonly
                            value="<?php echo $row['user_contact'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Select Gender</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php echo ($gender == 'male') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female" <?php echo ($gender == 'female') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="others" value="others" <?php echo ($gender == 'others') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="others">Others</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="address" autocomplete="off"
                            placeholder="Enter Your Address " rows="3"><?php echo $address ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Profile Image</label>
                        <input type="file" class="form-control" id="profile_img" name="profile_img"
                            aria-describedby="emailHelp" autocomplete="off">
                    </div>
                    <div class="mb-3 mt-4 text-center d-flex justify-content-end">
                        <button type="submit" class="btn btn-success col-md-5 col-sm-12" id="update_profile">Save Changes</button>
                    </div>
                </form>

                <h4 class="mt-5">Update Password</h4>
                <hr>

                <form id="update_password">
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="current_password" name="current_password"
                            aria-describedby="" autocomplete="off" required placeholder="Enter Your Current Password">
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password"
                            autocomplete="off" placeholder="Enter Your New Password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="text" class="form-control" id="confirm_password" name="confirm_password"
                            aria-describedby="emailHelp" autocomplete="off" required
                            placeholder="Confirm Your Password">
                    </div>
                    <div class="mb-3 mt-4 text-center d-flex justify-content-end">
                        <button type="submit" class="btn btn-success col-md-5 ol-sm-12" id="password_changes">Change
                            Password</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- Toaster For Image  -->
    <div class="position-fixed bottom-0 end-1 me-2"
        style="z-index: 9999; opacity: 99; left:10px; bottom: 130px !important;">
        <div id="liveToastImage" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body p-4" id="image-toast-body">
            </div>
        </div>
    </div>
    <!-- Toaster End -->

    <!-- Toaster For Data  -->
    <div class="position-fixed bottom-0 end-1 me-2"
        style="z-index: 9999; opacity: 99; left:10px; bottom: 13px !important;">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body p-4" id="toast-body">
            </div>
        </div>
    </div>
    <!-- Toaster End -->

    <!-- Add Footer Part -->
    <?php
    include("components/footer.php");
    ?>

    <script src="js/profile.js"></script>
    <script src="js/update-password.js"></script>

</body>

</html>