<?php
session_start();
require_once 'includes/database.php';
include_once "includes/header.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $file_des = $_POST['notes'];
    $query = "INSERT INTO `notes`(`id`, `title`, `file_des`, `category`, `date_time`) VALUES (NULL,'$title','$file_des','$category',NOW())";
    $result = @$conn->query($query);
    if (!$result) {
        $errno = $conn->errno;
        $errmsg = $conn->error;
        echo "Uploading failed with: ($errno) $errmsg<br/>\n";
        $conn->close();
        exit;
    } else {
        ?>
        <div class="container">
            <div class="alert alert-success">
                <h1>Successfully Uploaded..!</h1>
            </div>
        </div>
        <?php
    }
}
include_once "includes/footer.php";
?>
<script>
    setTimeout(function() {
        window.location.href = 'add-notes.php';
    }, 3000);
</script>