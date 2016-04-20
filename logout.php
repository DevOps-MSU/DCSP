<?php
if(!isset($_SESSION)) {
    session_start();
}
// Empty Session
$_SESSION = array();

// If using cookies, delete it by settings its expiry in the past
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

header("Location: login.php");