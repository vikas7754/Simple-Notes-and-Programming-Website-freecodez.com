<?php
session_start();
require_once 'includes/database.php';
include_once "includes/header.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $css_link = $_POST["css_link"];
    $data_slug = $_POST["data_slug"];

    $query = "INSERT INTO `css`(`id`, `title`, `css_link`, `category`, `data_slug`) VALUES (NULL,'$title','$css_link','$category','$data_slug')";
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
        window.location.href = 'add-content.php';
    }, 3000);
</script>