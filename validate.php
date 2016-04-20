<?php

if(!isset($_POST['username'], $_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    header("Location: login.php");
    die();
}

require 'connect.php';

try {
    $user = User::login($_POST['username'], $_POST['password']);
} catch (Exception $e) {
    header("Location: login.php?" . $e->getMessage());
    die();
}

$_SESSION['user'] = serialize($user);
$_SESSION['loggedIn'] = true;
header('Location: index.php');
?>
