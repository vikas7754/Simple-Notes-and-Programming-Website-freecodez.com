<?php
$page_title = "Add Notes";
$page_description = "Add Notes";
$page_link = "https://freecodez.com/add-notes.php";
$page_img = "https://freecodez.com/images/icon.png";
include_once "includes/header.php";
include_once "includes/database.php";
if (empty($login) || $role == 1) { ?>
    <script>
        window.location.href = "login.php";
    </script>
<?php
} else {
?>
<h1 class="text-center m-3">Add Content</h1>
    <div class="container">
        <div class="container-a">
            <form method="post" enctype="multipart/form-data" action="upload-notes.php">
                <div class="form-group m-3">
                    <label class="h6" for="title">Title of Content:</label>
                    <input class="form-control p-2" type="text" name="title" placeholder="Enter Title of content">
                </div>
                <div class="form-group m-3">
                    <label class="h6" for="category">Select Category:</label>
                    <select class="form-select form-control p-2" name="category">
                        <option value="none">Select Category</option>
                        <option value="notes">Aktu Notes</option>
                        <option value="lab">Aktu Lab-file</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group m-3">
                    <label class="h6" for="comment">Choose File:</label>
                    <input type="text" name="notes" class="form-control">
                </div>
                <div class="text-center">
                    <input class="btn btn-success m-3" type="submit" name="upload" value="Submit">
                </div>
            </form>
        </div>
    </div>
<?php
}
include_once "includes/footer.php";
?>