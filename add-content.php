<?php
$page_title = "Add Content";
$page_description = "Add Data";
$page_link = "https://freecodez.com/add-content.php";
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
            <form method="post" enctype="multipart/form-data" action="process.php">
                <div class="form-group m-3">
                    <label class="h6" for="title">Title of Content:</label>
                    <input class="form-control p-2" type="text" name="title" placeholder="Enter Title of content">
                </div>
                <div class="form-group m-3">
                    <label class="h6" for="category">Select Category:</label>
                    <select class="form-select form-control p-2" name="category">
                        <option value="none">Select Category</option>
                        <option value="codechef">Codechef</option>
                        <option value="leetcode">LeetCode</option>
                        <option value="cpp">Hackerrank C++</option>
                        <option value="java">Hackerrank Java</option>
                        <option value="c">HackerRank C</option>
                        <option value="python">Python</option>
                        <option value="sql">SQL</option>
                        <option value="problem_solving">Problem Solving</option>
                        <option value="30daysCode">30 Days Code</option>
                        <option value="js">10 Days JS</option>
                        <option value="ds">Data Structure</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group m-3">
                    <label class="h6" for="comment">Content Data:</label>
                    <textarea class="form-control" rows="15" name="content" placeholder="Enter All Content.."></textarea>
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