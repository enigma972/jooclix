<?php

namespace app\core\Terminal;

use app\Config;

class LussiTerminal extends Terminal
{
    const VERSION = '2.0.0';
    protected $commands = [
        'cache:clear',
        'cache:dump',
        'doctrine:actualdir',
        'generate:module',
        'generate:controller',
        'generate:entity',
        'router:match',
        'help'
    ];
    protected $errors = array();
    protected $module;
    protected $controller;
    protected $entity;
    protected $codeSkeleton = array();
    protected $config;
    protected $generate = array();

    public function __construct($command, $arguments, Config $config) {
        $this->config = $config;
        parent::__construct($command, $arguments);
    }

    public static function Main() {
        echo "Lussi Command Line Interface ", self::VERSION, "

Usage:
  command [options] [arguments]

Available commands:

  cache:clear               Effacez le cache de l'application
  cache:dump                Voir le contenu du cache
  doctrine:actualdir        Changer le dossier courant de doctrine
  generate:module           Générer un module
  generate:controller       Générer un controller
  generate:entity           Générer un entity
  router:match              Vérifier une route
  help                      Affichez ce message";
    }

    public function help() {
        self::Main();
    }

    protected function initializeCodeSkeleton() {

        $this->codeSkeleton['LussiEntity'] = "<?php\nnamespace $this->module\Managers;\n\nuse app\core\Managers\DataBaseManager\Manager;\nuse $this->module\Entity\\$this->entity;\n\nabstract class " . $this->entity . "Manager extends $this->entity.Manager\n{\n\t\n}";

        $this->codeSkeleton['LussiEntityPDO'] = "<?php\nnamespace $this->module\Managers;\n\nuse $this->module\Entity\\$this->entity;\nclass " . $this->entity . "Manager_PDO extends " . $this->entity . "Manager\n{\n\t\n}";

        $this->codeSkeleton['moduleLayout'] = "<!DOCTYPE html>\n<html>\n\t<head>\n\t\t<meta charset=\"utf-8\"/>\n\t\t<title>Default Layout</title>\n\t\t<style type=\"text/css\">\n\t\t</style>\n\t</head>\n\t<body>\n\t\t<h3>Layout de Base</h3>\n\t\t<p>Ceci est un layout de base généré par lussi</p>\n\t</body>\n</html>";

        $this->codeSkeleton['controller'] = "<?php\nnamespace $this->module\Controllers;\n\nuse app\core\Kernel\Controller;\n\nclass " . $this->module . "Controller extends Controller\n{\n\t\n}";

        $this->codeSkeleton['doctrine'] = "<?php\nnamespace $this->module\Managers;\n\nuse Doctrine\ORM\Mapping\Annotation;\n\nclass $this->entity\n{\n\t\n}";
    }

    protected function DoctrineActualdir($args)
    {
        if (key_exists('module', $args)) {
            if ($this->moduleExist($args['module'])) {
                $module = $this->config->app_root().'src/'.ucfirst($args['module']);

                $this->println('Pattientez ...');
                $moduleEntityDir = $module.'/Entity';

                // On crée le dossier Entity si elle n'existe pas
                if (!(file_exists($moduleEntityDir) and is_dir($moduleEntityDir))) $this->mkdir($moduleEntityDir);

                if (file_exists($moduleEntityDir) and is_dir($moduleEntityDir)) {
                    $moduleEntityDir = 'src/'.ucfirst($args['module']).'/Entity';
                    $this->config->set('actual_doctrine_dir', $moduleEntityDir);
                    $this->print('Le dossier de travail de doctrine est actuellement : ' . $moduleEntityDir);
                }

            } else { $this->println('Le nom du module saisi n\'existe pas!'); }

        }else{ $this->println("Voilà la synthaxe de cette commande:\n\n\tdoctrine:actualdir module:<<module_name>>"); }
    }

    protected function GenerateModule($args) {
        if (key_exists('module', $args)) {
           if ($this->moduleExist($args['module'])) {
                $this->println('Le nom du module saisi existe déjà! Veillez d\'abord le supprimer');
            } else {
                $module_name = $args['module'];

                $this->print('Bienvenue dans l\'assistant de création de module');
                $_module_name = $this->input("[Nom du module] [$module_name]: ");

                if ($_module_name == '' or $_module_name == $module_name) {
                    $answer = $this->input('[Generate Controller File][Yes]: ');
                    if ($answer != 'no')
                        $this->GenerateController($args);
                }



                exit;
            }

        }else{ $this->println("Voilà la synthaxe de cette commande:\n\n\tgenerate:module module:<<module_name>>"); }
    }

    protected function GenerateController($args) {
        if(key_exists('controller', $args) and key_exists('module', $args)) {
            if($this->controllerExist($args['module'], $args['controller'])) {
                $this->print('Le controller '.$args['module'] .'/'. $args['controller'] . 'Controller existe déjà !');
            } else {
                $this->controller = $args['controller'];
                $this->generate['controller'] = true;
            }
        } else {
            $this->println("Voilà la synthaxe de cette commande:\n\n\tgenerate:controller module:<<module_name>> controller:<<controller_name>>");
        }
    }

    /**
     * @param $module_name
     * @return bool
     * @internal param $module
     */
    protected function moduleExist($module_name) {
        if (is_string($module_name) and $module_name != '.' and $module_name != '..' and $module_name != ''){
            $module = $this->config->app_root().'src/'.ucfirst($module_name);
            if (file_exists($module) and is_dir($module)) return true;
        }
        return false;
    }

    protected function controllerExist($module_name, $controller_name) {
        if (is_string($controller_name) and $controller_name != '.' and $controller_name != '..' and $controller_name != ''){
            $module = $this->config->app_root().'src/'.ucfirst($module_name);
            $controller = $this->config->app_root().'src/'.ucfirst($module_name).'/Controllers/'.ucfirst($controller_name).'Controller.php';
            if ($this->moduleExist($module))
                if (file_exists($controller) and is_file($controller))
                    return true;
        }
        return false;
    }

    protected function Generate() {
        $this->initializeCodeSkeleton();

        if ($this->generate['module'] == true){

        }

        if ($this->generate['controller'] == true) $this->writeInFile('', '');

        if($this->generate['entity'] == true) $this->writeInFile('','');
    }
}