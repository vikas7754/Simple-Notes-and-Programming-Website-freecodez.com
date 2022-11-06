<?php
  $page_title = "Problem with code";
  $page_description = "Problem with code.";
  $page_link = "https://freecodez.com/code.php";
  $page_img = "https://freecodez.com/images/icon.png";
  include_once "includes/header.php";
  include_once "includes/database.php";
  $n = $_GET['n'];
  $q = str_replace("-"," ",$_GET['q']);

//select statement
$query_str = "SELECT * FROM $tblProblem WHERE id = '$n' AND title = '" . $q . "'";
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
        <div class="text-center m-2 copytoclipboard">
            <?php
              if($category == "sql"){ ?>
                <pre><code id="copy" class="language-sql"><textarea rows="100" cols="100" class="language-cpp"><?php echo "$result_row[solution]"; ?></textarea></code></pre>
                <?php 
             }elseif($category == "js"){?>
                 <pre><code id="copy"  class="language-javascript"><textarea rows="100" cols="100" class="language-cpp"><?php echo "$result_row[solution]"; ?></textarea></code></pre>
            <?php }else{ ?>
                <pre><code id="copy"  class="language-cpp"><textarea rows="100" cols="100" class="language-cpp"><?php echo "$result_row[solution]"; ?></textarea></code></pre>
                <?php }
            ?>
            <button onclick="copy()" class="btn btn-outline-success copy-btn"><i class="fa-solid fa-copy"></i> Copy to Clipboard</button>
        </div>
    </div>
<?php
  }
  include_once "includes/footer.php";
?>