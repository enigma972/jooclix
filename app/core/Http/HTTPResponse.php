<?php
/**
 * Created by PhpStorm.
 * User: Lusavuvu
 * Date: 12/01/2018
 * Time: 18:11
 */

namespace app\core\Http;

use app\core\Kernel\ApplicationComponent;
use app\core\Exceptions\LussiException;

/**
 * Class HTTPResponse
 * @package app\core\Http
 */
class HTTPResponse extends ApplicationComponent
{
    protected $page;
    protected $vars = array();

    /**
     * @param $header
     */
    public function addHeader($header)
    {
        header($header);
    }

    public function addVar($var, $value)
    {
        if (!is_string($var) || is_numeric($var) || empty($var)) {
            throw new LussiException('Le nom de la variable doit être une chaine de caractère non nulle');
        }
        $this->vars[$var] = $value;
    }

    /**
     * @param $location
     */
    public function redirect($location)
    {
        header('location: ' . $location);
        exit;
    }

    /**
     *
     */
    public function redirect404()
    {
        $this->response($this->getPage());
        header('HTTP/1.0 404 Not Found');
        $this->send();
    }

    /**
     * @param $page
     */
    public function response($page)
    {
        $this->setPage($page);
    }

    // todo: Supprimer la methode HTTPResponse::render

    /**
     * Cette methode devra être suppimé dans les verssins à vnier, elle n'est là que pour de raison de compatibilité
     * @param $layout
     * @param $view
     * @throws LussiException
     */
    public function render($layout, $view)
    {
        if (!file_exists($layout) || !file_exists($view)) {
            throw new LussiException();
        }

        $this->init_render($layout, $view);
    }

    /**
     * Le layout et la vue doivent avoir cette syntaxe => chemin:layout
     * @param $layout
     * @param $view
     * @param array $arguments
     * @throws LussiException
     */
    public function renderView($layout, $view, array $arguments = array()) {
        // On verifie si la syntaxe est correcte
        if (preg_match('#(.*):(.*)#', $layout, $layout_file) and preg_match('#(.*):(.*)#', $view, $view_file)) {
            $appSrc = $this->app->config()->app_root().'src/';

            // On prepare les fichiers pour les testes
            $layout_file = $appSrc.$layout_file[1].'/Ressources/Views/'.$layout_file[2];
            $view_file = $appSrc.$view_file[1].'/Ressources/Views/'.$view_file[2];

            if ((file_exists($layout_file) and is_file($layout_file)) and (file_exists($view_file) and is_file($view_file))) {
                $this->vars = array_merge($this->vars, $arguments);
                $this->init_render($layout_file, $view_file);
            } else {
                throw new LussiException('Le layout ou la vue spécifiée n\'existe pas');
            }
        } else {
            throw new LussiException('Vous n\'avez pas respecté la synthaxe qui est << moduleName:dossier/du/la/vue >>');        
        }
    }

    public function init_render($layout, $view) {
        extract($this->vars);
        $user = $this->app->user();
        ob_start();
        require $view;
        $page = ob_get_clean();
        ob_start();
        require $layout;
        $this->setPage(ob_get_clean());
    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * @param $name
     * @param string $value
     * @param int $expire
     * @param null $path
     * @param null $domain
     * @param bool $secure
     * @param bool $httpOnly
     */
    public function setCookie($name, $value = '', $expire = 0, $path = null, $domain = null, $secure = false, $httpOnly = true)
    {
        setcookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
    }

    /**
     * @param $key
     * @param $value
     */
    public function setSession($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param $key
     * @return null
     */
    public function getSession($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    /**
     * @param $key
     * @return bool
     */
    public function sessionExist($key)
    {
        return isset($_SESSION[$key]);
    }

    /**
     * @param $key
     */
    public function unsetSession($key)
    {
        $_SESSION[$key] = null;
        unset($_SESSION[$key]);
    }

    /**
     * @param $uri
     * @return mixed
     */
    public function generateUrl($uri)
    {
        return $uri;
    }

    /**
     *
     */
    public function send()
    {
        exit($this->getPage());
    }
}