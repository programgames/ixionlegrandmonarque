<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 29/12/2018
 * Time: 22:37
 */

namespace App\LoLDataGetter;



use Exception;

class BadRequestException extends Exception
{
    public function __construct($message, $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

}