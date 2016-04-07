<?php

if(!isset($_POST['post'], $_POST['id']) || empty($_POST['post']) || empty($_POST['id'])) {
    header("Location: thread.php?id=".$_POST['id']);
    die();
}

require 'config.php';

try {
    $user = Post::post($user->getID(), $_POST['id'], $_POST['post']);
} catch (Exception $e) {
    header("Location: thread.php?id={$_POST['id']}&" . $e->getMessage());
    die();
}

header("Location: thread.php?id={$_POST['id']}");
?>