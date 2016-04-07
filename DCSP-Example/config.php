<?php
// Display and Report all errors and warnings
ini_set('display_errors',1);
error_reporting(E_ALL);

//Load configuration file for site
if (!$ini = parse_ini_file('config.ini', TRUE)) {
    echo "Unable to load configuration file";
    die();
}

// Make your DCSP-Example directory an include path (where PHP can find your classes folders, files, etc)
set_include_path(get_include_path() . ':/home/' . $ini['MySQL']['netID'] . '/public_html/DCSP-Example');

// Include necessary classes
require 'classes/DB.php';
require 'classes/User.php';
require 'classes/ErrorHandler.php';
require 'classes/Thread.php';
require 'classes/Post.php';

// Attempt to connect to the database
try {
    $db = new DB();
} catch(Exception $e) {
    // Error Handler I made, but isn't really used. Too little time.
    ErrorHandler::error($e->getMessage());
}

// Begin a session
session_start();

// If the user has logged in, set $user to their data
if(isset($_SESSION['user'])) {
    $user = unserialize($_SESSION['user']);
}