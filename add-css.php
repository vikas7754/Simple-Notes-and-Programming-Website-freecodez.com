<?php
$page_title = "Add CSS";
$page_description = "Add CSS";
$page_link = "https://freecodez.com/add-css.php";
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
<h1 class="text-center m-3">Add CSS</h1>
    <div class="container">
        <div class="container-a">
            <form method="post" enctype="multipart/form-data" action="process-css.php">
                <div class="form-group m-3">
                    <label class="h6" for="title">Title of Content:</label>
                    <input class="form-control p-2" type="text" name="title" placeholder="Enter Title of content">
                </div>
                <div class="form-group m-3">
                    <label class="h6" for="category">Select Category:</label>
                    <select class="form-select form-control p-2" name="category">
                        <option value="none">Select Category</option>
                        <option value="button">css button</option>
                        <option value="card">css card</option>
                        <option value="menu">css menu</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group m-3">
                    <label class="h6" for="comment">CodePen Link:</label>
                    <input type="text" class="form-control" name="css_link" placeholder="codepen link..">
                </div>
                <div class="form-group m-3">
                    <label class="h6" for="comment">Data Slug:</label>
                    <input type="text" class="form-control" name="data_slug" placeholder="data slug..">
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