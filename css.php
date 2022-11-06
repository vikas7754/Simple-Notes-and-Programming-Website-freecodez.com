<?php
$page_title = "CSS";
$page_description = "css.";
$page_link = "https://freecodez.com/css.php";
$page_img = "https://freecodez.com/images/icon.png";
include_once "includes/header.php";
include_once "includes/database.php";
$q = str_replace("-", " ", $_GET['q']);

//select statement
$query_str = "SELECT * FROM $tblCss WHERE title = '" . $q . "'";
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
            <div>
                <p class="codepen" data-height="500" data-default-tab="html,result" data-slug-hash="<?php echo $result_row['data_slug']; ?>" data-user="vikas7754" 
                style="
                       height: 500px;
                       box-sizing: border-box;
                       display: flex;
                       align-items: center;
                       justify-content: center;
                       border: 2px solid;
                       margin: 1em 0;
                       padding: 1em;
                    ">
                    <span>See the Pen
                        <a href="<?php echo $result_row['css_link']; ?>">
                        <?php echo $result_row['title']; ?></a>
                        by Vikas (<a href="https://codepen.io/vikas7754">@vikas7754</a>) on
                        <a href="https://codepen.io">CodePen</a>.</span>
                </p>
                <script async src="https://cpwebassets.codepen.io/assets/embed/ei.js"></script>
            </div>
        </div>
    </div>
<?php
}
include_once "includes/footer.php";
?>