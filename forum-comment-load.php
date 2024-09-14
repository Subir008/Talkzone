<?php
    include ("db/db.php");

    $id = $_POST['id'];
    // $id = 1;

    $limit = 3;
    if(isset($_POST['page_no'])){
        $page = $_POST['page_no'];
    }else{
        $page = 0;
    }

    $comment_query = "SELECT * FROM comment_master WHERE forum_id = '" . $id . "' ORDER BY entry_timestamp DESC LIMIT {$page},$limit";
    $comment_dataget = mysqli_query($con, $comment_query);

    if(mysqli_num_rows($comment_dataget) > 0){
        $output = "";

        while ($comment_data = mysqli_fetch_assoc($comment_dataget)) {
            $last_id = $comment_data['comment_id'];
            $output .= "
            <div class='row g-0 px-2 comment-user'>
                <div class='col-md-1 col-sm-1 col-1 text-center '>
                    <i class='fa-solid fa-circle-user fa-2x'></i>
                </div>
                <div class='col-md-11 col-sm-11 col-11'>
                    <div class='card-body card-details'>
                        <h5 class='card-title'>Card title</h5>
                        <p class='card-text'> {$comment_data["comment_details"]}</p>
                    </div>
                </div>
            </div>";
    }

    $output .= "
            <div class='row g-0 d-flex justify-content-center mb-4'>
                <button type='button' class='btn btn-outline-primary btn-md col-6 ' data-id='{$last_id}'>Load More</button>
            </div>";

    echo $output;

}else{
    echo "No comments found";
}

mysqli_close($con);
?>