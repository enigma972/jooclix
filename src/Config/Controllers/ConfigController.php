<?php

namespace Config\Controllers;

use app\core\Http\HTTPRequest;
use app\core\Http\HTTPResponse;
use app\core\Kernel\Controller;

class ConfigController extends Controller
{
    public function executeConfig(HTTPRequest $request, HTTPResponse $response)
    {
        $response->addVar('title', 'Configuration');
        $response->render(__DIR__ . '/../Ressources/Views/layout.php', __DIR__ . '/../Ressources/Views/_config/_config.php');
    }

    public function executeConfigurator_step(HTTPRequest $request, HTTPResponse $response)
    {
        if ($request->get('step') == 0) {
            if ($request->isMethod('POST')) {
                if ($request->postExist('driver') && $request->postExist('host') && $request->postExist('name') && $request->postExist('user')) {
                    if (file_exists(dirname(dirname(dirname(__DIR__))) . '/app/config/app.xml')) {
                        $xml = simplexml_load_file(dirname(dirname(dirname(__DIR__))) . '/app/config/app.xml');


                        // Le fichier de configuration
                        $xml->config[0]['value'] = $request->post('driver') == 'pdo_mysql' ? 'pdo_mysql' : '';
                        $xml->config[1]['value'] = $request->post('host');
                        $xml->config[2]['value'] = $request->postExist('port') ? $request->post('port') : 3306;
                        $xml->config[3]['value'] = $request->post('name');
                        $xml->config[4]['value'] = $request->post('user');
                        $xml->config[5]['value'] = $request->postExist('password') ? $request->post('password') : '';
                        $xml->saveXML(dirname(dirname(dirname(__DIR__))) . '/app/config/app.xml');
                    }
                }

                // Tous s'est bien passé alors on redirige vers l'etape 2
                header('location: /app_dev/_configurator/step/1');
            } else {
                $response->addVar('title', 'DataBase Configuration ');
                $response->render(__DIR__ . '/../Ressources/Views/layout.php', __DIR__ . '/../Ressources/Views/_config/_config_step1.php');
            }
        }

        if ($request->get('step') == 1) {
            if ($request->get('generate') == '1') {
                $response->response(json_encode(md5(mt_rand())));
            } else {
                if ($request->postExist('secret')) {
                    if (file_exists(dirname(dirname(dirname(__DIR__))) . '/app/config/app.xml')) {
                        $xml = simplexml_load_file(dirname(dirname(dirname(__DIR__))) . '/app/config/app.xml');

                        // Le fichier de configuration
                        $xml->config[6]['value'] = $request->post('secret');
                        $xml->saveXML(dirname(dirname(dirname(__DIR__))) . '/app/config/app.xml');
                    }

                    // Tous s'est bien passé alors on redirige vers l'etape finale
                    header('location: /app_dev/_configurator/final');
                } else {
                    $response->addVar('title', 'Global Secret Configuration');
                    $response->render(__DIR__ . '/../Ressources/Views/layout.php', __DIR__ . '/../Ressources/Views/_config/_config_step2.php');
                }

            }
        }
    }

    public function executeConfigurator_final(HTTPRequest $request, HTTPResponse $response)
    {
        $response->addVar('title', 'Module de Config Web');
        $response->render(
            __DIR__ . '/../Ressources/Views/layout.php',
            __DIR__ . '/../Ressources/Views/_config/_config_finish.php'
        );
    }
}