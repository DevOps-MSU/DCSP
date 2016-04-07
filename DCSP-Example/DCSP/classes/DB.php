<?php

// Wrapper class to connect to database. Not necessary, but helps form the data
// for our constructor.
class DB extends PDO {
	public function __construct() {
        global $ini;
        
        $dns = $ini['MySQL']['driver'] .
        ':host=' . $ini['MySQL']['host'] .
        ((!empty($ini['MySQL']['port'])) ? (';port=' . $ini['MySQL']['port']) : '') .
        ';dbname=' . $ini['MySQL']['netID'];
       
        parent::__construct($dns, $ini['MySQL']['netID'], $ini['MySQL']['password']);
	}
}
