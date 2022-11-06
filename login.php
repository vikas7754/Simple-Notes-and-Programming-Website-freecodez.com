<?php
$page_title = "Login here";
$page_description = "To use additional services please login. If you don't have any account create one.";
$page_link = "https://freecodez.com/login.php";
$page_img = "https://freecodez.com/images/icon.png";
$login_status = "";
require_once "includes/header.php";
if (!empty($login)) {
?>
    <script>
        window.location.href = 'profile.php';
    </script>
<?php
}
?>
<div class="container">
    <div class="wrapper1">
        <?php
        if (isset($_GET['ls'])) {
            $login_status = $_GET['ls'];

            if ($login_status == 1) {
                echo "<p class='alert alert-success m-3'>You are logged in as <span class='text-success text-uppercase'>", $_SESSION['login'], "</span></p>";
                echo "<div class='text-center'><a class='btn btn-success' href='index.php'>Goto Homepage</a></div>"; ?>
                <script>
                    setTimeout(function() {
                        window.location.href = 'profile.php';
                    }, 3000);
                </script>

            <?php } elseif ($login_status == 2) {
                echo "<h1>Login</h1>";
                echo "<p class='alert alert-danger m-2'><strong>Login failed: </strong>Incorrect username/password combination.</p>";
            } elseif ($login_status == 3) {
                echo "<h1>Login</h1>";
                echo "<p class='alert alert-success'>Thank you. Your account has been created.</p>";
                // echo "<a class='btn btn-danger' href='logout.php'>LOG OUT</a><br>";
                header("Refresh:3; url=profile.php", true, 303);
            }
        } else {
            echo "<p class='lead m-2'>You are not logged in.<br>Please login or <a href='register.php'>create</a> a new account</p>";
        }

        if ($login_status != 1 && $login_status != 3) { ?>
            <form action="login-process.php" method="post">
                <div class="form-group m-2">
                    <label for="newUserName" class="col-sm-2 control-label">Username</label>
                    <input type="text" class="form-control" id="newUserName" name="username" placeholder="Username" required>
                </div>
                <div class="form-group m-2">
                    <label for="newPassword" class="col-sm-2 control-label">Password</label>
                    <input type="password" class="form-control" id="newPassword" name="password" placeholder="Password" required>
                </div>
                <div class="form-group m-2">
                    <input type="submit" name="login" class="btn btn-success" value="Login">
                    <p class="mt-2">Don't Have Account: <a href="register.php">Register Here</a></p>
                </div>
            </form>
        <?php } ?>
    </div>
</div>
<?php
include('includes/footer.php');
?>