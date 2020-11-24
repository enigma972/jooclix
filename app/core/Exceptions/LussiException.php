<?php
/**
 * Created by PhpStorm.
 * User: Lusavuvu
 * Date: 03/02/2018
 * Time: 00:45
 */

namespace app\core\Exceptions;


class LussiException extends \Exception
{
    protected $vars = array();

    public function __construct($message = '', $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }


}