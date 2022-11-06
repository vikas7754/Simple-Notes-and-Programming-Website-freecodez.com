<?php
session_start();
//destroy the session data on disk
session_destroy();
//delete the session cookie
setcookie(session_name(), '', time() - 3600);
//destroy the $_SESSION array
$_SESSION = array();

$page_title = "Log Out";
$page_description = "Logout.";
$page_link = "https://freecodez.com/logout.php";
$page_img = "https://freecodez.com/images/icon.png";
include('includes/header.php');
?>

<?php
echo '
    <div class="container mt-5">
        <div class="alert alert-success alert-dismissible">
            <strong>Successfully Logged Out! </strong> Redirecting to login page.
        </div>
    </div>
            ';
include('includes/footer.php'); ?>
<script>
    setTimeout(function() {
        window.location.href = 'login.php';
    }, 2000);
</script>