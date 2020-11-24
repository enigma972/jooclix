<?php
/**
 * Created by PhpStorm.
 * User: Lusavuvu
 * Date: 23/01/2018
 * Time: 01:37
 */

namespace app;

use app\core\Exceptions\LussiException;
use app\core\Kernel\Application;

class AppKernel extends Application
{
    public function __construct()
    {
        parent::__construct();
    }

    public function run($isProductMode = false)
    {
        $controller = $this->getController($isProductMode);
        // todo: ré-implementer la méthode getController
        //$controller = $this->getCntrller(true);

        try {
            $controller->execute();
        } catch (LussiException $e) {
            //header('location: /');
            exit($e->getMessage());
        }

        $this->response->send();
    }
}