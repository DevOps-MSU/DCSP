<?php
// Display and Report all errors and warnings
ini_set('display_errors',1);
error_reporting(E_ALL);


// Include necessary classes
require 'classes/DB.php';
require 'classes/User.php';
require 'classes/ErrorHandler.php';
require 'classes/Thread.php';
require 'classes/Post.php';

// Attempt to connect to the database
$servername = "127.0.0.1";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=dcsp_project", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

// Begin a session
session_start();

// If the user has logged in, set $user to their data
if(isset($_SESSION['user'])) {
    $user = unserialize($_SESSION['user']);
}
