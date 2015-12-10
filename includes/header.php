<?php
    include("config.php");
    $title = basename($_SERVER["SCRIPT_FILENAME"], '.php');

    //Used to check which page is selected
    $pages = array(
        "admin.php" => "",
        "user.php" => "",
        "anotheradmin.php" => "",
        "login.php" => ""
    );
    //Loops through and compares the current page with the $pages-array
    foreach ($pages as $k => $value) {
        $pages[$k] = basename($_SERVER['SCRIPT_NAME']) == $k ? "selected" : "";
    }

    if (isset($_GET['logout'])) {
        logout();
    }
?>
<!doctype html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=2.0;">
</head>

<body>
    <header class="site-header">
        <h3> Admin test page v.2</h3>
    </header>

    <nav class="navbar">
        <a class="<?= $pages["admin.php"] ?>" href="admin.php">Admin content</a>
        <a class="<?= $pages["user.php"] ?>" href="user.php">Content</a>
        <a class="<?= $pages["anotheradmin.php"] ?>" href="anotheradmin.php">Another admin page</a>
        <a class="<?= $pages["login.php"] ?>" href="login.php">Login</a>
    </nav>
    <div class="site-content">
