<?php
/**
 * Created by PhpStorm.
 * User: Lusavuvu
 * Date: 12/01/2018
 * Time: 18:10
 */

namespace app\core\Http;

/**
 * Class HTTPRequest
 * @package app\core\Http
 */
class HTTPRequest
{
    /**
     * @param $key
     * @return null
     */
    public function getCookie($key)
    {
        return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
    }

    /**
     * @param $key
     * @return bool
     */
    public function cookieExist($key)
    {
        return isset($_COOKIE[$key]);
    }

    /**
     * @param $key
     * @return null
     */
    public function get($key)
    {
        return isset($_GET[$key]) ? $_GET[$key] : null;
    }

    /**
     * @param $key
     * @return bool
     */
    public function getExist($key)
    {
        return isset($_GET[$key]);
    }

    /**
     * @param $key
     * @param $value
     */
    public function setGet($key, $value)
    {
        $_GET[$key] = $value;
    }

    /**
     * @param $key
     * @return null
     */
    public function post($key)
    {
        return isset($_POST[$key]) ? $_POST[$key] : null;
    }

    /**
     * @param $key
     * @return bool
     */
    public function postExist($key)
    {
        return !empty($_POST[$key]);
    }

    /**
     * @return string
     */
    public function requestURI()
    {
        return !empty($_GET['lu467ed28fc55cfsabbe703a45vu3e93034078vu']) ? '/' . $_GET['lu467ed28fc55cfsabbe703a45vu3e93034078vu'] : '/';
    }

    /**
     * @param $key
     * @return null
     */
    public function server($key)
    {
        return isset($_SERVER[strtoupper($key)]) ? $_SERVER[strtoupper($key)] : null;
    }

    /**
     * @param $key
     */
    public function file($key)
    {

    }

    /**
     * @return bool
     */
    public function isAjax()
    {
        return !empty($this->server('http_x_requested_with'));
    }

    /**
     *@return boolean
     */
    public function isMethod($method) {
        return $_SERVER['REQUEST_METHOD'] == $method?true:false;
    }
}