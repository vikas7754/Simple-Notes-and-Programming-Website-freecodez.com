<?php
session_start();
require_once 'includes/database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $content = htmlspecialchars($_POST['content']);
    $content_t = str_replace("\\","\\\\",$content);
    $content_txt = str_replace("\\","\\\\",$content);
    
    $query = "INSERT INTO `problems`(`id`, `title`, `solution`, `category`) VALUES (NULL,'$title','$content_txt','$category')";
    $result = @$conn->query($query);
    if (!$result) {
        $errno = $conn->errno;
        $errmsg = $conn->error;
        echo "Uploading failed with: ($errno) $errmsg<br/>\n";
        $conn->close();
        exit;
    } else {
    ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Uploading</title>
            <style>
            .text-center{
                text-align:center;
                margin-top: 200px;
            }
            .text-success{
                color: green;
            }
            </style>
        </head>
        <body>
            <div class="text-center">
                <h1 class="text-success">Content Uploaded.</h1>
            </div>
        </body>
        </html>
    <?php
    }
}
    ?>
    <script>
        setTimeout(function() {
            window.location.href = 'add-content.php';
        }, 3000);
    </script>