<?php
require 'vendor/autoload.php';

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use app\core\DIC\Container;
use app\Config;

$container = new Container(new Config());

return ConsoleRunner::createHelperSet($container->getEntityManager(true));