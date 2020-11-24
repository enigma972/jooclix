<?php
/**
 * Created by PhpStorm.
 * User: Lusavuvu
 * Date: 12/01/2018
 * Time: 18:07
 */

namespace app\core\Kernel;

use app\core\Managers\DatabaseManager\API\PDOfactory;
use app\core\Managers\DatabaseManager\Managers;
use app\core\Exceptions\LussiException;
use app\core\Security\FireWall;
use app\core\Routing\Router;

/**
 * Class Controller
 * @package app\core\Kernel
 */
abstract class Controller extends ApplicationComponent
{
    use FireWall;
    
    /**
     * @var string
     */
    protected $action = '';
    /**
     * @var string
     */
    protected $module = '';


    /**
     * Controllers constructor.
     * @param Application $app
     * @param string $action
     * @param string $module
     */
    public function __construct(Application $app, $action, $module)
    {
        parent::__construct($app);
        $this->action = $action;
        $this->module = $module;
    }

    /**
     * This method execute the action request by User
     */
    public function execute()
    {
        $method = 'execute' . ucfirst($this->action);
        if (!is_callable(array($this, $method))) {
            throw new LussiException('L\'action ' . $this->action . ' n\'est pas définie dans ce module');
        }
        $this->$method($this->app->request(), $this->app->response());
    }

    public function generateUrl($routeName, array $arguments) {
        $router = new Router();
    }

    public function render($layout, $view, array $arguments = array()) {
        $this->app->response()->renderView($layout, $view, $arguments);
    }

    public function __get($attributeName)
    {
        if ($attributeName === 'container' and !isset($this->container)) {
            return $this->app->getContainer();
        }
    }
}