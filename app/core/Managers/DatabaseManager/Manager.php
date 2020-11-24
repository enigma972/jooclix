<?php
/**
 * Created by PhpStorm.
 * User: Lusavuvu
 * Date: 12/01/2018
 * Time: 18:12
 */

namespace app\core\Managers\DataBaseManager;

/**
 * Class Manager
 * @package app\core\Managers\DataBaseManager
 */
abstract class Manager
{
    /**
     * @var
     */
    protected $dao;

    /**
     * Manager constructor.
     * @param $dao
     */
    public function __construct($dao)
    {
        $this->dao = $dao;
    }
}