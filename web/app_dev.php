<?php
/**
 * Created by PhpStorm.
 * User: Lusavuvu
 * Date: 12/01/2018
 * Time: 18:08
 */

// Mon autoload perso
// require '../app/autoload.php';

// L'autoloader de composer
require '../vendor/autoload.php';

if (in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1'])) {
    $app = new app\AppKernel();
    $app->run(true);
} else {
    header('HTTP/1.0 403 Forbidden');
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8"/>
        <title>Lussi | The Web Framework</title>
        <link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.css"/>
    </head>
    <body>
    <div class="container well">
        <div class="alert alert-danger">
            <h3>Erreur 403 Accès Interdit!</h3>
            <p>Vous ne pouvez accéder à cette page qu'en local et apparemment vous ne l'étes pas. <a
                        class="btn btn-primary" href="/">Allez à l'acceuil de l'application</a></p>
        </div>
    </div>
    </body>
    </html>
<?php }