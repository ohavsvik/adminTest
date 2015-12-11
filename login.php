<?php
/**
 * The login page
 */

require "includes/header.php";

$html = "";

if (isset($_POST['login'])) {
    $name     = isset($_POST['acronym']) ? strip_tags($_POST['acronym']) : null;
    $password = isset($_POST['password']) ? strip_tags($_POST['password']) : null;

    if (!$user->login($name, $password)) {
        if (!$user->isAuthenticated()) {
            $html .= "Fel användarnamn eller lösenord.";
        }
    } else {
        if (isset($_GET['referer'])) {
            $referer = htmlentities($_GET['referer']);
            header("Location:" . $referer);
        }
    }
}

if (isset($_POST['logout'])) {
    if (!$user->logout()) {
        $html .= "Du är redan utloggad";
    }
}

if ($user->isAuthenticated()) {
    $html .= "Du är inloggad";
    $html .= $user->generateLogoutForm();
} else {
    $html .= $user->generateLoginForm();
}

echo $html;

require "includes/footer.php";
