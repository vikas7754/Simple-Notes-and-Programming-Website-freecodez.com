<?php
require_once "includes/database.php";
$page_title = "Your Profile.";
$page_description = "Your all details are hidden. Only you can access this section.";
$page_link = "https://freecodez.com/profile.php";
$page_img = "https://freecodez.com/images/icon.png";
include_once "includes/header.php";
if (empty($login)) {
    header('Location: login.php');
    exit();
}
$query_str = "SELECT * FROM user WHERE user_id = '$_SESSION[id]'";
//execut the query
$result = $conn->query($query_str);
$result_row = $result->fetch_assoc();

//Handle selection errors
if (!$result) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
} else {
?>
    <div class="container">
        <div class="wrapper1 text-center">
            <div class="profile-img">
                <img src="https://img.freecodez.com/images/profile.jpg" alt="error" width="100%">
            </div>
            <div class="profile-content m-3">
                <h4><span class="white"><?php echo "$result_row[name]"; ?></span></h4>
                <h6>Username: <span class="text-success"><?php echo "$result_row[username]"; ?></span></h6>
                <h6>Password: <span class="text-primary"><?php echo "$result_row[password]"; ?></span></h6>
                <a class="link-dark" href='<?php echo "$result_row[email]"; ?>'><?php echo "$result_row[email]"; ?></a>
            </div>
            <?php
              if($role == 2){
                  echo "<div><a href='add-content.php' class='btn btn-primary'>Add Content</a> <a href='add-notes.php' class='btn btn-primary'>Add Notes</a> <a href='add-css.php' class='btn btn-primary'>Add CSS</a></div>";
              }
            ?>
            <p class="text-secondary">All details are hidden. Only you can see your details.</p>
        </div>
    </div>

<?php
}
include_once "includes/footer.php";
?>