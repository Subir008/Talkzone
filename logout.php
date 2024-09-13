<?php
    include ("db/db.php");

    session_start();

    session_unset();

    session_destroy();

    // $login = "No";

    header("location : index.php");

?>