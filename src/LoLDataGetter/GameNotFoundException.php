<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 30/12/2018
 * Time: 17:47.
 */

namespace App\LoLDataGetter;

use Exception;

class GameNotFoundException extends Exception
{
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return __CLASS__.": [{$this->code}]: {$this->message}\n";
    }
}
