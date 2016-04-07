<?php

require 'config.php';

if(!isset($user)) {
    header('Location: login.php');
    die();
}

if(isset($_POST['title']) && !empty($_POST['title'])) {
    $title = htmlspecialchars($_POST['title']);
    $query = $db->prepare("INSERT INTO `dcsp-ex-threads` (`poster` ,`title`) VALUES (?, ?);");
    $query->execute(array($user->getID(), $title));

    $id = $db->lastInsertId();

    echo json_encode(array(
        'success' => true,
        'id' => $id
    ));
} else {
    echo json_encode(array(
        'success' => false,
        'msg' => "Title not set or empty"
    ));
}