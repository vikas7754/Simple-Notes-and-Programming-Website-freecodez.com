<?php
//start session
@session_start();

//number of items in the shopping cart
$count = 0;

//retrieve the cart content
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];

    if ($cart) {
        $items = explode(',', $cart);
        $count = count($items);
    }
}
//check to see if a user if logged in
$login = '';
$name = '';
$role = 1;

if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
}

if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
}

if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
}

if (isset($_SESSION['id'])) {
    $session_id = $_SESSION['id'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://freecodez.com/images/fav.jpg" type="image/x-icon">
    <meta name="description" content="<?php echo $page_description; ?>">
    <link rel="canonical" href="<?php echo $page_link; ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo $page_title; ?>" />
    <meta property="og:description" content="<?php echo $page_description; ?>" />
    <meta property="og:image" content="<?php echo $page_img; ?>" />
    <meta property="og:url" content="<?php echo $page_link; ?>" />
    <meta property="og:site_name" content="www.freecodez.com" />
    <meta name="keywords" content="Free Notes, Freecodez, Programming Solution, Web Devlopment">
    <title>Freecodez - <?php echo $page_title; ?> </title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-217800928-1">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-217800928-1');
    </script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5332831846915728" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/465a387109.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='pdf/lib/webviewer.min.js'></script>
    <link href="css/prism.css" rel="stylesheet">
    <style>
        <?php
        include_once "css/main.css";
        ?>
    </style>
</head>

<body>
    <div class="main-container-x">
        <div class="container-x">
            <div class="pre-btn">
                <a href="" class="gold">
                    <img class="a star" src="https://www.picbuckets.com/images/star.png" />
                    <img class="b star" src="https://www.picbuckets.com/images/star.png" />
                    <img class="c star" src="https://www.picbuckets.com/images/star.png" />
                    <img class="d star" src="https://www.picbuckets.com/images/star.png" />
                    <img class="e star" src="https://www.picbuckets.com/images/star.png" />
                    <img class="f star" src="https://www.picbuckets.com/images/star.png" />
                    Please Support us</a>
            </div>
            <div class="subcontainer-x">
                <div class="search-container-x">
                    <div class="sub-search-container-x">
                        <h1 class="heading-x">Search Anything You Want!</h1>
                        <form action="search.php" class="search-form-x" method="get" role="form">
                            <input type="text" name="image" placeholder="Enter What You Want.." id="imageSearch" class="form-input-x" />
                            <button type="submit" name="search" class="btn-x"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                </div>
                <div class="menubar">
                    <nav>
                        <div class="logo">
                            <a href="/">
                                <h2>Freecodez</h2>
                            </a>
                        </div>
                        <div class="openMenu" id="openMenu"><i class="fa fa-bars"></i></div>
                        <ul class="mainMenu" id="mainMenu">
                            <li><a href="/" class="active"><i class="fa-solid fa-house-chimney"></i> Home</a></li>
                            <li><a href="index.php">Notes</a></li>
                            <li>
                                <button class="dropbtn">
                                    Categories <i class="fa-solid fa-caret-down"></i>
                                </button>
                                <div class="dropdown-content">
                                    <a href="notes.php">AKTU Notes</a>
                                    <a href="labs.php">AKTU Labs</a>
                                    <a href="hackerrank.php">HackerRank</a>
                                    <a href="leetcode.php">LeetCode</a>
                                    <a href="codechef.php">CodeChef</a>
                                    <a href="others.php">Other</a>
                                    <a href="blogs.php">Blogs</a>
                                </div>
                            </li>
                            <?php
                            if (empty($login)) : ?>
                                <li><a href="login.php">Login</a></li>
                                <li><a href="register.php">Register</a></li>
                            <?php
                            endif;
                            if (!empty($login) && $role == 1) : ?>
                                <li><a href="contact.php">Contact</a></li>
                                <li>
                                    <button class="dropbtn">
                                        <i class="fa-solid fa-user"></i> User Account <i class="fa-solid fa-caret-down"></i>
                                    </button>
                                    <div class="dropdown-content">
                                        <a href="profile.php"><?php echo $name; ?></a>
                                        <a href="profile.php">Profile <i class="fa-solid fa-angles-right"></i></a>
                                        <a href="logout.php">Logout <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                                    </div>
                                </li>
                            <?php
                            endif;
                            if (!empty($login) && $role == 2) : ?>
                                <li><a href="add-content.php">Add Content <i class="fa-solid fa-upload"></i></a></li>
                                <li>
                                    <button class="dropbtn">
                                        <i class="fa-solid fa-user"></i> User Account <i class="fa-solid fa-caret-down"></i>
                                    </button>
                                    <div class="dropdown-content">
                                        <a href="profile.php"><?php echo $name; ?></a>
                                        <a href="profile.php">Profile <i class="fa-solid fa-angles-right"></i></a>
                                        <a href="logout.php">Logout <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <div class="closeMenu" id="closeMenu"><i class="fa fa-times"></i></div>
                            <span class="icons">
                                <i class="fab fa-facebook"></i>
                                <i class="fab fa-instagram"></i>
                                <i class="fab fa-twitter"></i>
                                <i class="fab fa-github"></i>
                            </span>
                        </ul>
                    </nav>
                </div>
                <img class="bg-image" src="https://image.shutterstock.com/image-vector/programming-code-coding-hacker-background-260nw-1714491562.jpg" width="100%" height="400px">
            </div>
        </div>
    </div>

    <!-- Go to Top button -->
    <div id="topbutton">
        <div id="basso" onclick="topbtn()">
            <div id="freccia">
                <span id="top"></span>
            </div>
        </div>
    </div>