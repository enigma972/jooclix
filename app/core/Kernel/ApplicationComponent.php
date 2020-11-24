<?php
/**
 * Created by PhpStorm.
 * User: Lusavuvu
 * Date: 22/01/2018
 * Time: 23:18
 */

namespace app\core\Kernel;


/**
 * Class ApplicationComponent
 * @package app\core\Kernel
 */
class ApplicationComponent
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * ApplicationComponent constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }
}