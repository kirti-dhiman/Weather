<?php namespace App\Exceptions;

class DataNotFoundException extends \Exception {
    public function errorMessage() {
        //error message
        $errorMsg = MSG_DATE_NOT_FOUND;
        return $errorMsg;
    }
}