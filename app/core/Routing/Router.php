<?php
/**
 * Created by PhpStorm.
 * User: Lusavuvu
 * Date: 12/01/2018
 * Time: 18:11
 */

namespace app\core\Routing;

use app\core\Exceptions\LussiException;


/**
 * Class Router
 * @package app\core\Routing
 */
class Router
{
    /**
     * @var array
     */
    protected $routes = array();

    /**
     * @var int
     */
    const NO_ROUTE = 1;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        // todo: On va verifier si les routes sont en cache alors on les chargent dans l'array $routes sinon on ne fait rien
    }

    /**
     * @param Route $route
     */
    public function addRoute(Route $route)
    {
        if (!in_array($route, $this->routes)) {
            $this->routes[] = $route;
        }
    }

    /**
     * @param $url
     * @return mixed
     * @throws LussiException
     */
    public function getRoute($url)
    {
        foreach ($this->routes as $route) {
            // Si la route correspond à l'URL.
            if (($varsValues = $route->match($url)) !== false) {

                // Si elle a des variables
                if ($route->hasVars()) {
                    $varsNames = $route->varsNames();
                    $listVars = array();

                    // On créé un nouveau tableau clé/valeur.
                    // (Clé = nom de la variable, valeur = sa valeur.)
                    foreach ($varsValues as $key => $match) {
                        // La première valeur contient entièrement la chaine capturée (voir la doc sur preg_match).
                        if ($key !== 0) {
                            $listVars[$varsNames[$key - 1]] = $match;
                        }
                    }
                    // On assigne ce tableau de variables à la route.
                    $route->setVars($listVars);
                }
                return $route;
            }
        }
        throw new LussiException('Aucune route ne correspond à l\'URL', self::NO_ROUTE);
    }
}