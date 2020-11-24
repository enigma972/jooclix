<?php
/**
 * Created by PhpStorm.
 * User: Lusavuvu
 * Date: 13/01/2018
 * Time: 03:13
 */

namespace app;


/**
 * Class Config
 * @package app\Config
 */
class Config
{
    protected $web_root;
    protected $app_root;
    protected $vars = array();

    public function __construct()
    {
        $this->web_root(true);
        $this->app_root(true);
    }

    public function web_root($set = false)
    {
        if ($set) {
            $this->web_root = dirname(__DIR__) . '/web/';
        } else {
            return $this->web_root;
        }
    }

    public function app_root($set = false)
    {
        if ($set) {
            $this->app_root = dirname(__DIR__) . '/';
        } else {
            return $this->app_root;
        }

        return $set === false ? $this->app_root : dirname(__DIR__) . '/';

    }

    public function get($var)
    {
        if (!$this->vars) {
            $xml = new \DOMDocument;
            $xml->load(__DIR__ . '/Config/app.xml');
            $elements = $xml->getElementsByTagName('config');
            foreach ($elements as $element) {
                $this->vars[$element->getAttribute('var')] = $element->getAttribute('value');
            }
        }

        return isset($this->vars[$var]) ? $this->vars[$var] : null;
    }

    public function add($var, $value)
    {
        $xml = new \SimpleXMLElement(__DIR__ . '/Config/app.xml', null, true);
        $config = $xml->addChild('config');
        $config->addAttribute('var', $var);
        $config->addAttribute('value', $value);
        $xml->saveXML(__DIR__ . '/Config/app.xml');
    }

    public function set($var, $value) {
        $xml = new \SimpleXMLElement(__DIR__ . '/Config/app.xml', null, true);

        foreach ($xml->config as $item) {
            if ($item['var'] == $var) {
                $item['value'] = $value;
                break;
            }
        }

        $xml->saveXML(__DIR__ . '/Config/app.xml');
    }
}