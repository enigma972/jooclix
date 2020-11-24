<?php
/**
 * Created by PhpStorm.
 * User: Lusavuvu
 * Date: 12/01/2018
 * Time: 18:11
 */

namespace app\core\Routing;


/**
 * Class Route
 * @package app\core\Routing
 */
class Route
{
    protected $url;
    protected $action;
    protected $module;
    protected $controller;
    protected $name;
    protected $varsNames = array();
    protected $vars = array();
    


    public function __construct($url, $module, $action, $controller, $name, array $varsNames)
    {
        $this->setUrl($url);
        $this->setModule($module);
        $this->setAction($action);
        $this->setVarsNames($varsNames);
        $this->setController($controller);
        $this->setName($name);
    }

    public function hasVars()
    {
        return !empty($this->varsNames);
    }

    public function match($url)
    {
        if (preg_match('`^' . $this->url . '$`i', $url, $matches)) {
            return $matches;
        } else {
            return false;
        }
    }

    public function setAction($action)
    {
        if (is_string($action)) {
            $this->action = $action;
        }
    }

    public function setModule($module)
    {
        if (is_string($module)) {
            $this->module = $module;
        }
    }

    public function setUrl($url)
    {
        if (is_string($url)) {
            $this->url = $url;
        }
    }

    public function setVarsNames(array $varsNames)
    {
        $this->varsNames = $varsNames;
    }

    public function setVars(array $vars)
    {
        $this->vars = $vars;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
    }

    /**
     * @return mixed
     */
    public function controller()
    {
        return $this->controller;
    }

    public function action()
    {
        return $this->action;
    }

    public function module()
    {
        return $this->module;
    }

    public function vars()
    {
        return $this->vars;
    }

    public function varsNames()
    {
        return $this->varsNames;
    }

    public function setName($name)
    {
        if (is_string($name)) {
            $this->name = $name;
        }
    }

    public function name()
    {
        return $this->name;
    }
}