<?php
$page_title = "Register New Account";
$page_description = "Please create your account to use additional services.";
$page_img = "https://freecodez.com/images/icon.png";
$page_link = "https://freecodez.com/register.php";
require_once 'includes/header.php';
require_once "includes/database.php";
?>
<?php
$username_err = $name_err = $email_err = $pwd_err = $confirm_pwd_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
	require("register-process.php");
}
?>
<div class="container">
	<div class="wrapper1">
		<h2 class="text-center mb-3">Create Account</h2>
		<form action="register.php" method="post">
			<div class="form-group m-2">
				<label>Username<span class="text-danger">*</span></label>
				<input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php if (isset($_POST['username'])) echo $username; ?>" placeholder="Username" required>
				<span class="text-danger"><?php echo $username_err; ?></span>
			</div>
			<div class="form-group m-2">
				<label>Full Name<span class="text-danger">*</span></label>
				<input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php if (isset($_POST['name'])) echo $name; ?>" placeholder="Full Name" required>
				<span class="text-danger"><?php echo $name_err; ?></span>
			</div>
			<div class="form-group m-2">
				<label>Email Address<span class="text-danger">*</span></label>
				<input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php if (isset($_POST['email'])) echo $email; ?>" placeholder="Email Address" requiredq>
				<span class="text-danger"><?php echo $email_err; ?></span>
			</div>
			<div class="form-group m-2">
				<label>Password<span class="text-danger">*</span></label>
				<input type="password" name="password" class="form-control <?php echo (!empty($pwd_err)) ? 'is-invalid' : ''; ?>" placeholder="Password" required>
				<span class="text-danger"><?php echo $pwd_err; ?></span>
			</div>
			<div class="form-group m-2">
				<label>Confirm Password<span class="text-danger">*</span></label>
				<input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_pwd_err)) ? 'is-invalid' : ''; ?>" placeholder="Confirm Password" required>
				<span class="text-danger"><?php echo $confirm_pwd_err; ?></span>
			</div>
			<div class="form-group m-2">
				<input type="submit" class="btn btn-primary" value="Register" name="register">
				<input type="reset" class="btn btn-secondary ml-2" value="&#x21bb;">
			</div>
			<p class="m-2">Already have an account? <a href="login.php">Login here</a>.</p>
		</form>
	</div>
</div>

<?php
include_once "includes/footer.php";
?>