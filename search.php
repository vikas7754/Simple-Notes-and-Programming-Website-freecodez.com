<?php
$page_title = "Your Search Result";
$page_description = "Search result";
$page_link = "https://freecodez.com/search.php";
$page_img = "https://freecodez.com/images/icon.png";
require_once('includes/header.php');
require_once('includes/database.php');

$name = $_GET['image'];

//select statement
$query_str = "SELECT * FROM $tblProblem WHERE title LIKE '%$name%'";

//execut the query
$result = $conn->query($query_str);

//Handle selection errors
if (!$result) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
} else { //display results in a table
?>


    <?php
    $num_rows = mysqli_num_rows($result);
    if ($num_rows == 0) {
        echo "<p class='lead text-center text-danger'>No results found for <strong>" . $name . "</strong>. Please search again.</p>";
    } else { ?>
        <div class="sc">
            <div class="search-box">
                <input class="p-2 form-control" type="text" id="myInput" placeholder="Search..." onkeyup="search()">
            </div>
        </div>
        <div class="list-container">
            <div class="list-card">
                <?php
                while ($result_row = $result->fetch_assoc()) {
                    $p = str_replace(" ", "-", $result_row['title']);
                    echo "
            <div class='list'>
                <a href='code.php?q=$p'>$result_row[title]</a>
            </div>
            ";
                } ?>

            </div>
        </div>
<?php
    }
    // clean up resultsets when we're done with them!
    $result->close();
}

// close the connection.
$conn->close();

include('includes/footer.php');
?>