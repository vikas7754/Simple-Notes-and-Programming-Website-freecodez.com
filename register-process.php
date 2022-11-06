<?php
function validate_input($txt)
{
    if (!empty($txt)) {
        $trim_txt = trim($txt);
        $sanitize_txt = filter_var($trim_txt, FILTER_UNSAFE_RAW);
        return $sanitize_txt;
    }
    return '';
}
function validate_email($emailValue)
{
    if (!empty($emailValue)) {
        $trim_txt = trim($emailValue);
        $sanitize_txt = filter_var($trim_txt, FILTER_SANITIZE_EMAIL);
        return $sanitize_txt;
    }
    return '';
}
$error = array();
$username = validate_input($_POST["username"]);
if (!empty($username)) {
    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = @$conn->query($query);
    //handle error
    if (!$result) {
        $errno = $conn->errno;
        $errmsg = $conn->error;
        echo "Insertion failed with: ($errno) $errmsg<br/>\n";
        $conn->close();
        exit;
    } else {
        if ($result->num_rows == 1) {
            $username_err = "Username already taken..!";
        }
    }
} else {
    $username_err = "Username can't be empty..!";
}

$name = validate_input($_POST["name"]);
if (empty($name)) {
    $name_err = "Name can't be empty..!";
}
$email = validate_email($_POST["email"]);
if (empty($email)) {
    $email_err = "Email can't be empty..!";
}
$password = validate_input($_POST["password"]);
if (empty($password)) {
    $pwd_err = "Password can not be empty..!";
}
$confirm_password = validate_input($_POST["confirm_password"]);
if (empty($confirm_password)) {
    $confirm_pwd_err = "Confirm Password can not be empty..!";
} elseif ($password != $confirm_password) {
    $confirm_pwd_err = "Password did not match..!";
}

if (empty($username_err) && empty($name_err) && empty($email_err) && empty($pwd_err) && empty($confirm_pwd_err)) {
    //Insert statement
    $query_stry = "INSERT INTO `user`(`user_id`, `username`, `name`, `email`, `password`, `role`, `date-time`) VALUES (NULL, '$username', '$name', '$email', '$password', '$role', NOW())";
    //Execute the query
    $insert_result = @$conn->query($query_stry);
    if (!$insert_result) {
        $errno = $conn->errno;
        $errmsg = $conn->error;
        echo "Insertion failed with: ($errno) $errmsg<br/>\n";
        $conn->close();
        exit;
    } else {
        $new_result = @$conn->query($query);
        //It is a valid user. Need to store the user in Session Variables
        $_SESSION['login'] = $username;
        $result_row = $new_result->fetch_assoc();
        $_SESSION['role'] = $role;
        $_SESSION['name'] = $name;
        $_SESSION['id'] = $result_row['user_id'];
        echo "<div class='alert alert-success m-3'>
        <strong>Success!</strong> Your account has been created.
      </div>"
        ?>
        <script>
            setTimeout(function() {
                window.location.href = 'profile.php';
            }, 3000);
        </script>
        <?php
    }
} else {
    echo "<h3 class='text-center text-danger m-2'>Registration Failed..!</h3>";
}
?>