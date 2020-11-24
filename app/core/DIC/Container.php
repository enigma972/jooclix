<?php

namespace app\core\DIC;

use app\core\Managers\DatabaseManager\API\PDOFactory;
use app\core\Managers\DatabaseManager\Managers;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use app\Config;

class Container
{
    protected $config;
    protected $instances = array();

    /**
     * Container is Constructor
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function getCache($CacheType = 'Doctrine\Common\Cache\FilesystemCache', $directory = null)
    {
        if (!isset($this->instances['doctrine.cache'])) {
            if (is_null($directory)) $directory = $this->config->app_root() . $this->config->get('cache_dir');
            $this->instances['doctrine.cache'] = new $CacheType($directory);
        }
        return $this->instances['doctrine.cache'];
    }

    public function getEntityManager($isDevMode = false)
    {
        if (!isset($this->instances['doctrine.orm'])) {
            // the connection configuration
            $dbParams = array(
                'driver' => $this->config->get('db_driver'),
                'user' => $this->config->get('db_user'),
                'password' => $this->config->get('db_password'),
                'dbname' => $this->config->get('db_name')
            );

            $path = array($this->config->app_root() . $this->config->get('actual_doctrine_dir'));

            $config = Setup::createAnnotationMetadataConfiguration($path, $isDevMode);
            $this->instances['doctrine.orm'] = EntityManager::create($dbParams, $config);
        }
        return $this->instances['doctrine.orm'];
    }

    public function getRepository($entity, $isDevMode = false) {
        return $this->getEntityManager($isDevMode)->getRepository($entity);
    }

    public function getEventManager() {
        return $this->getEntityManager()->getEventManager();
    }

    public function getLussiManager()
    {
        if (!isset($this->instances['self.orm'])) {
            $this->instances['self.orm'] = new Managers('PDO',
                PDOFactory::getMysqlConnexion(
                    $this->config->get('db_host'),
                    $this->config->get('db_name'),
                    $this->config->get('db_user'),
                    $this->config->get('db_password')
                )
            );
        }
        return $this->instances['self.orm'];
    }
    
    public function getMailer() {
        if(!isset($this->instances['mailer'])) {
            $this->instances['mailer'] = \Swift_Mailer::newInstance(
                \Swift_smtpTransport::newInstance(
                    $this->config->get('smtp_host'),
                    $this->config->get('smtp_port')
                )
                    ->setUsername($this->config->get('smtp_username'))
                    ->setPassword($this->config->get('smtp_password'))
            );
        }
        return $this->instances['mailer'];
    }
}