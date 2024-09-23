<?php
include("db/db.php");

$searchValue = $_GET['searchValue'];

$query = "SELECT * FROM forum WHERE heading LIKE '% $searchValue %' OR details LIKE '% $searchValue %'";

$dataget = mysqli_query($con, $query);

if (mysqli_num_rows($dataget) > 0) {
    while ($row = mysqli_fetch_assoc($dataget)) {
        $details = $row['details'];
        $forum_id = $row['forum_id'];
        $forum_img = $row['forum_img'];
        $heading = $row['heading'];

        if ($forum_img != "") {
            $img_html = '
             <a href="forum-details.php?id=' . $forum_id . '">
            <img src="image/thread-img/' . $forum_img . '" class="card-img-top" alt="Forum Image">
            </a>
            ';
            $detailsResult =  substr($details, 0, 80);
        } else {
            $img_html = '';
            $detailsResult =  substr($details, 0, 220);
        }

        echo '<div class="col">
            <div class="card h-100">
                ' . $img_html . '
                <div class="card-body">
                    <h5 class="card-title">' . $heading . '</h5>
                     <a href="forum-details.php?id=' . $forum_id . '">
                    <p class="card-text">' . $detailsResult . '........ </p>
                   More</a>
                </div>
            </div>
        </div>';
    }
} else{
    echo '
        <p class="text-center" style="margin-left: 15px;margin-top: 15px;font-size: larger; font-weight: 500;">No results found</>
    ';
}



?>