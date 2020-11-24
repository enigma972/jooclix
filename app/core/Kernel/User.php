<?php
/**
 * Created by PhpStorm.
 * User: Lusavuvu
 * Date: 12/01/2018
 * Time: 17:36
 */

namespace app\core\Kernel;

use app\core\Exceptions\LussiException;

session_start();

/**
 * Class User
 * @package app\core\Kernel
 */
class User extends ApplicationComponent
{
    /**
     * @param $attr
     * @return null
     */
    public function getAttribute($attr)
    {
        return isset($_SESSION[$attr]) ? $_SESSION[$attr] : null;
    }

    /**
     * @return mixed
     */
    public function getFlash()
    {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }

    /**
     * @return bool
     */
    public function hasFlash()
    {
        return isset($_SESSION['flash']);
    }

    /**
     * @return bool
     */
    public function isAuthenticated()
    {
        return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
    }

    /**
     * @param $attr
     * @param $value
     */
    public function setAttribute($attr, $value)
    {
        $_SESSION[$attr] = $value;
    }

    /**
     * @param bool $authenticated
     * @throws LussiException
     */
    public function setAuthenticated($authenticated = true)
    {
        if (!is_bool($authenticated)) {
            throw new LussiException('La valeur spécifiée à la
méthode User::setAuthenticated() doit être un boolean');
        }
        $_SESSION['auth'] = $authenticated;
    }

    /**
     * @param $value
     */
    public function setFlash($value)
    {
        $_SESSION['flash'] = $value;
    }
}