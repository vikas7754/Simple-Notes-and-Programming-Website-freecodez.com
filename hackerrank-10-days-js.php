<?php
$page_title = "Hackerrank 10 days js Solutions";
$page_description = "Hackerrank 10 days js Solutions. Here we have provided some possible Hackerrank 10 days js solutions";
$page_link = "https://freecodez.com/hackerrank-10-days-js.php";
$page_img = "https://freecodez.com/images/icon.png";
include_once "includes/header.php";
include_once "includes/database.php";
$query = "SELECT title FROM problems WHERE category = 'js'";
$result = $conn->query($query);
//Handle selection errors
if (!$result) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
} else {
?>
<h1 class="text-center m-4">Hackerrank 10 JS Solutions</h1>
<div class="sc">
    <div class="search-box">
        <input class="p-2 form-control" type="text" id="myInput" placeholder="Search Codechef Problem..." onkeyup="search()">
    </div>
</div>
<div class="list-container">
    <div class="list-card">
    <?php
        while ($result_row = $result->fetch_assoc()) { 
            $p = str_replace(" ","-",$result_row['title']);
            echo "
            <div class='list'>
                <a href='code.php?q=$p'>$result_row[title]</a>
            </div>
            ";
        } ?>
        
    </div>
</div>

<?php
$result->close();
}
$conn->close();
include_once("includes/footer.php");
?>