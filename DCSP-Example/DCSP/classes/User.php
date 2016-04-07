<?php

// Class for User table.
class User {
    // Used for creating a salt. Not necessary in newer versions of PHP
    const saltAlphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    private $id;
    private $username;

    public function __construct($id, $username) {
        $this->id = $id;
        $this->username = $username;
    }

    public function getID() { return $this->id; }
    public function getUsername() { return $this->username; }

    // Handles authentication for a user
    public static function login($username, $password) {
        global $db;

        $query = $db->prepare("SELECT * FROM `dcsp-ex-users` WHERE `username` = ?;");
        $query->execute(array($username));

        if($query->rowCount() !== 1) {
            throw new Exception("invalidUsername");
        }

        $user = $query->fetch(PDO::FETCH_ASSOC);

        // If entered password is correct, return a User. Otherwise, throw exception.
        if(User::passwordsMatch($password, $user['password'])) {
            return new User($user['id'], $user['username']);
        } else {
            throw new Exception("invalidPassword");
        }
    }

    // Create a new user in the database
    public static function register($username, $password) {
        global $db;

        // Username has to be at least one character long.
        if(strlen($username) < 1) {
            throw new Exception("emptyUsername");
        }

        // Usernames are restricted to alphanumeric characters
        if(!ctype_alnum($username)) {
            throw new Exception("specialChars");
        }

        // Ensure username has not already been taken
        if(!User::usernameAvailable($username)) {
            throw new Exception("usernameTaken");
        }

        // Encrypt password for storage in the database
        $password = User::hashPassword($password);

        $query = $db->prepare("INSERT INTO `dcsp-ex-users` (`username`, `password`) VALUES (?, ?);");
        $query->execute(array($username, $password));

        return true;
    }

    // Hash the password. In neweer versions of PHP, use password_hash()
    public static function hashPassword($password) {
        // Use CRYPT_BLOWFISH with cost of 10 (see manual)
        $salt = '$2y$10$';

        // Generate 22 character pseudo-random salt
        for($i = 0; $i < 22; $i++) {
            $salt .= substr(User::saltAlphabet, mt_rand(0, 61), 1);
        }

        // Hash and return password
        return crypt($password, $salt);
    }

    // Compare a hashed password and a plaintext password
    public static function passwordsMatch($plainPassword, $hashedPassword) {
        if(crypt($plainPassword, $hashedPassword) === $hashedPassword) {
            return true;
        } else {
            return false;
        }
    }

    // See if a username is taken
    public static function usernameAvailable($username) {
        global $db;
        
        $query = $db->prepare("SELECT count(*) as usernameTaken from `dcsp-ex-users` WHERE `username` = ?;");
        $query->execute(array($username));
        $twoFactor = $query->fetch(PDO::FETCH_ASSOC);
        return !(bool)$twoFactor['usernameTaken'];
    }

    // Delete a user from the database
    public function delete() {
        global $db;

        $query = $db->prepare("DELETE FROM `dcsp-ex-users` WHERE `id` = ?");
        $query->execute(array($this->id));

        return;
    }
    
}