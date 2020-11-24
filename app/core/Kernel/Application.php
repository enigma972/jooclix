<?php
/**
 * Created by PhpStorm.
 * User: Lusavuvu
 * Date: 12/01/2018
 * Time: 17:31
 */

namespace app\core\Kernel;

use app\core\Exceptions\LussiException;
use app\core\Http\HTTPResponse;
use app\core\Http\HTTPRequest;
use app\core\Routing\Router;
use app\core\Routing\Route;
use app\core\DIC\Container;
use app\Config;


/**
 * Class Application
 * @package app\core\Kernel
 */
abstract class Application
{
    /**
     * @const string
     */
    const APP_VERSION = '2.0.0';

    /**
     * @var HTTPRequest
     */
    protected $request;
    /**
     * @var HTTPResponse
     */
    protected $response;
    /**
     * @var User
     */
    protected $user;
    /**
     * @var Config
     */
    protected $config;
    /**
     * @var Container
     */
    protected $container;

    /**
     * Application constructor.
     */
    public function __construct()
    {
        $this->request = new HTTPRequest;
        $this->response = new HTTPResponse($this);
        $this->user = new User($this);
        $this->config = new Config();
    }

    /**
     * @return HTTPRequest
     */
    public function request()
    {
        return $this->request;
    }

    /**
     * @return HTTPResponse
     */
    public function response()
    {
        return $this->response;
    }

    /**
     * @return User
     */
    public function user()
    {
        return $this->user;
    }

    /**
     * @return Config
     */
    public function config()
    {
        return $this->config;
    }

    /**
     * @param $isProductMode
     * @return mixed
     */
    public function getController($isProductMode)
    {
        $router = new Router();
        $routing = new \DOMDocument('1.0', 'utf-8');

        if (!$isProductMode) {
            $routing->load($this->config()->app_root() . '/app/config/routing.xml');

            foreach ($routing->getElementsByTagName('file') as $file) {

                if (file_exists($this->config()->app_root() . $file->getAttribute('src'))) {

                        $xml = new \DOMDocument('1.0', 'utf-8');
                        $xml->load($this->config()->app_root() . $file->getAttribute('src'));
                        $routes = $xml->getElementsByTagName('route');

                        // On parcourt les routes du fichier XML.
                        foreach ($routes as $route) {
                            $vars = array();

                            // On regarde si des variables sont présentes dans l'URL.
                            if ($route->hasAttribute('vars')) {
                                $vars = explode(',', $route->getAttribute('vars'));
                            }

                            // On ajoute la route au routeur.
                            $router->addRoute(new Route(
                                $route->getAttribute('url'),
                                $route->getAttribute('module'),
                                $route->getAttribute('action'),
                                $route->getAttribute('controller'),
                                $route->getAttribute('name'),
                                $vars
                            ));
                        }
                }
            }
        } else {
            $routing->load(__DIR__ . '/../../Config/routing_dev.xml');

            $routes = $routing->getElementsByTagName('route');
            // On parcourt les routes du fichier XML.
            foreach ($routes as $route) {
                $vars = array();
                // On regarde si des variables sont présentes dans l'URL.
                if ($route->hasAttribute('vars')) {
                    $vars = explode(',', $route->getAttribute('vars'));
                }
                // On ajoute la route au routeur.
                $router->addRoute(new Route(
                    $route->getAttribute('url'),
                    $route->getAttribute('module'),
                    $route->getAttribute('action'),
                    $route->getAttribute('controller'),
                    $route->getAttribute('name'),
                    $vars
                ));
            }
        }

        try {
            // On récupère la route correspondante à l'URL.
            $matchedRoute = $router->getRoute($this->request->requestURI());
        } catch (LussiException $e) {
            if ($e->getCode() == Router::NO_ROUTE) {
                // Si aucune route ne correspond, c'est que la page demandée n'existe pas.
                $this->response->response('La ressources que vous cherchez n\'est pas disponible ou a été supprimé');
                $this->response->redirect404();
            }
        }

        // On ajoute les variables de l'URL au tableau $_GET.
        $_GET = array_merge($_GET, $matchedRoute->vars());

        // On instancie le contrôleur.
        $controllerClass = $matchedRoute->module() . '\\Controllers\\' . $matchedRoute->controller();

        return new $controllerClass($this, $matchedRoute->action(), $matchedRoute->module());
    }

    public function getCntrller($isProductMode = true) {
        $router = new Router();
        $routing = new \DOMDocument('1.0', 'utf-8');

        if ($isProductMode) {
            $routing->load($this->config()->app_root().'app/config/routing.xml');

            foreach($routing->getElementsByTagName('file') as $file) {
                $routing_file = $this->config()->app_root().$file->getAttribute('src');

                if (file_exists($routing_file) and is_file($routing_file)) {
                    $routing_file = new \DOMDocument('1.0', 'utf-8');


                }
            }
        } else {
            $routing->load($this->config()->app_root().'app/config/routing_dev.xml');
        }

        die(var_dump($router));
    }

    public function getContainer()
    {
        if (!$this->container instanceof Container) {
            $this->container = new Container($this->config());
        }
        return $this->container;
    }

    /**
     * @return mixed
     */
    abstract public function run();
}