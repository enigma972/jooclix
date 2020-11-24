<div class="col-md-8 col-md-offset-2 corps">
    <h3></h3>
    <h1 style="font-weight: bold;">Félicitations!</h1>
    <h4><span style="background-color: #ACCD4A;color: #fafafa;font-weight: bold;">Votre application Lussi est maintenant configuré</span>
    </h4>
    <p style="font-size: 17px;">Votre configuration a été écrite dans le fichier app.xml (dans <span
                style="font-weight: bold;"><?= 'app/config/app.xml'; ?>)</span></p>
    <p>
        <textarea name="" id="" cols="30" rows="8" class="form-control">Vos paramètres:
        Database_driver: <?= $this->app->config()->get('db_driver'); ?> (PDO)
        Database_host: <?= $this->app->config()->get('db_host'); ?>

            Database_name: <?= $this->app->config()->get('db_name'); ?>

            Database_port: <?= $this->app->config()->get('db_port'); ?>

            Database_user: <?= $this->app->config()->get('db_user'); ?>

            Database_password: <?= $this->app->config()->get('db_password'); ?>

            Global Secret: <?= $this->app->config()->get('secret'); ?></textarea>
    </p>
    <p><a href="/app.php/demo">Aller à la page d'acceuil</a></p>
</div>
<div class="col-md-8 col-md-offset-2 text-right" style="padding-top: 15px;">
    <span>Lussi Standard Edition <?= \app\core\Kernel\Application::APP_VERSION; ?></span>
</div>