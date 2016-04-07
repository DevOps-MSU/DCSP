<?php

// Error handler class. Can log errors to file if needed. Only implemented in one place.
class ErrorHandler
{
    public static function error($msg) {
        global $ini;

        $error = date('Y-m-d H:i:s') . ' -- ' . $msg . PHP_EOL;

        if($ini['Errors']['writeToFile'] === '1') {
            file_put_contents('/home/' . $ini['MySQL']['netID'] . '/' . $ini['Errors']['logName'], $error, FILE_APPEND);
        }

        echo $error;
        die();
    }
}