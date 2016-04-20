<?php

if(!isset($_POST['username'], $_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    header("Location: register.php");
    die();
}

require 'connect.php';
require 'classes/User.php';

try {
    $user = User::register($_POST['username'], $_POST['password']);
} catch (Exception $e) {
    header("Location: register.php?" . $e->getMessage());
    die();
}

header('Location: login.php?registerSuccess');
?>
