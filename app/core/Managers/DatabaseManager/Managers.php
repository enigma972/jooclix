<?php
/**
 * Created by PhpStorm.
 * User: Lusavuvu
 * Date: 12/01/2018
 * Time: 18:12
 */

namespace app\core\Managers\DatabaseManager;

use app\core\Exceptions\LussiException;


/**
 * Class Managers
 * @package app\core\Managers\DatabaseManager
 */
class Managers
{
    /**
     * @var null
     */
    protected $api = null;
    /**
     * @var null
     */
    protected $dao = null;
    /**
     * @var array
     */
    protected $managers = array();

    /**
     * Managers constructor.
     * @param $api
     * @param $dao
     */
    public function __construct($api, $dao)
    {
        $this->api = $api;
        $this->dao = $dao;
    }

    /**
     * @param $module
     * @param $manager
     * @return string
     * @throws LussiException une exception est lancé si le manager demandé est invalide
     */
    public function getManagerOf($manager, $module)
    {
        if (!is_string($manager) || empty($manager)) {
            throw new LussiException('Le manager spécifié est invalid');
        }
        if (!isset($this->managers[$manager])) {
            $manager = $module . '\\Managers\\' . $manager . 'Manager_' . $this->api;
            $this->managers[$manager] = new $manager($this->dao);
        }

        return $this->managers[$manager];
    }
}