<?php
$page_title = "Aktu notes";
$page_description = "Aktu notes.";
$page_link = "https://freecodez.com/notes.php";
$page_img = "https://freecodez.com/images/icon.png";
include_once "includes/header.php";
include_once "includes/database.php";
$q = str_replace("-", " ", $_GET['q']);

//select statement
$query_str = "SELECT * FROM $tblNotes WHERE title = '" . $q . "'";
// $review_str = "SELECT review_rating, review_content FROM $tblReviews WHERE reviews.review_image_id=" . $id . "";


//execute the query
$result = $conn->query($query_str);
// $review_result = $conn->query($review_str);

//Handle selection errors
if (!$result) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
} else {
    $result_row = $result->fetch_assoc();
    $category = $result_row["category"];
?>
    <div class="container-q">
        <h2 class="text-center mt-5"><?php echo $result_row['title']; ?></h2>
        <div class="text-center m-2">
            <iframe src="https://drive.google.com/file/d/<?php echo $result_row['file_des']; ?>/preview" width="100%" height="600" allow="autoplay"></iframe>
        </div>
    </div>
<?php
}
include_once "includes/footer.php";
?>