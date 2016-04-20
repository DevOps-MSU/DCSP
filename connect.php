<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";

require 'classes/DB.php';
require 'classes/User.php';
require 'classes/ErrorHandler.php';
require 'classes/Thread.php';
require 'classes/Post.php';


try {
    $conn = new PDO("mysql:host=$servername;dbname=dcsp_project", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
