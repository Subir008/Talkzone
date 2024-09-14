<?php
    // include ("db/db.php");

    session_start();

    session_unset();

    session_destroy();

    echo "You Have Been Logged Out Successfully. Please Login To Continue......";
?>