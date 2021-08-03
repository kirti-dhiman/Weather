<?php namespace App\Exceptions;

class DataNotAddedException extends \Exception {
    public function errorMessage() {
        //error message
        $errorMsg = MSG_DATE_NOT_ADDED;
        return $errorMsg;
    }
}