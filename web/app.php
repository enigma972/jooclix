<?php
/**
 * Created by PhpStorm.
 * User: Lusavuvu
 * Date: 12/01/2018
 * Time: 18:07
 */

// L'autoloader de composer
require '../vendor/autoload.php';

$app = new app\AppKernel;
$app->run();