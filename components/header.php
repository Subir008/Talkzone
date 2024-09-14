<?php
include("login.php");
?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark p-3">
    <div class="container-fluid">

        <!-- Show in mobile view -->
        <?php
        if (isset($_SESSION['login']) && $_SESSION['login'] == "Yes") {
            ?>
            <div class="dropdown login mobile-view-on mr-3">
                <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <!-- <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle"> -->
                    <i class="fa-solid fa-user fa-lg" style="color: #fffff;"></i>
                </a>
                <ul class="dropdown-menu text-small login-dropdown" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item logged-out" href="#" id="">Sign out</a></li>
                </ul>
            </div>
            <?php
        }
        ?>

        <a class="navbar-brand" href="#">Fixed navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown06" data-bs-toggle="dropdown"
                        aria-expanded="false">Dropdown</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown06">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

            <?php
            if (!isset($_SESSION['login']) || $_SESSION['login'] == "No") {

                ?>
                <div class="login mx-3">
                    <button type="button" class="btn btn-outline-light me-2" data-bs-toggle="modal"
                        data-bs-target="#loginModal" onclick="clearlogindata()">Login</button>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#signupModal"
                        onclick="cleardata()">Sign-up</button>
                </div>

                <?php
            }
            ?>

            <?php
            if (isset($_SESSION['login']) && $_SESSION['login'] == "Yes") {
                ?>
                <!-- Hide in mobile view -->
                <div class="dropdown login mobile-view-off mx-3 ">
                    <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle"> -->
                        <i class="fa-solid fa-user fa-lg" style="color: #fffff;"></i>
                    </a>
                    <ul class="dropdown-menu text-small login-dropdown" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item logged-out" >Log out</a></li>
                    </ul>
                </div>
                <?php
            }
            ?>

        </div>
    </div>
</nav>

<!-- Alert Start -->
<div id="alert">
</div>
<!-- Alert End -->

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="loginform">
                    <!-- <form action="signup.php" method="post"> -->
                    <div class="mb-3">
                        <label for="login_contact" class="form-label">Contact Number</label>
                        <input type="tel" class="form-control" id="login_contact" name="login_contact"
                            aria-describedby="emailHelp" autocomplete="off" required
                            placeholder="Enter Your Contact Here" pattern="[0-9]{10}">
                    </div>
                    <div class="mb-3">
                        <label for="login_password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="login_password" name="login_password"
                            autocomplete="off" required placeholder="Enter Your Password Here">
                    </div>
                    <div class="mb-3 text-center">
                        <button type="button" class="btn btn-danger col-5 close" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary col-5" id="login">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Sign Up Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="signupform">
                    <!-- <form action="signup.php" method="post"> -->
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact Number</label>
                        <input type="tel" class="form-control" id="contact" name="contact" aria-describedby="emailHelp"
                            autocomplete="off" required placeholder="Enter Your Contact Here" pattern="[0-9]{10}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="off"
                            required placeholder="Enter Your Password Here">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword"
                            autocomplete="off" required placeholder="Confirm Your Password ">
                    </div>
                    <div class="mb-3 text-center">
                        <button type="button" class="btn btn-danger col-5 close" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary col-5" id="signup">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>