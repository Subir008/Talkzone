<?php
    include ("db/db.php");
    
    $searchValue = $_GET['searchValue'];

    $query = "SELECT * FROM ";

    $dataget = mysqli_query($con , $query);
?>