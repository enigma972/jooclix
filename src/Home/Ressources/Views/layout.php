<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title><?= isset($title)? $title:'Home page'; ?></title>
    <link rel="stylesheet" type="text/css" href="/libs/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/libs/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="/libs/owlcarousel/owl.theme.min.css">
    <link rel="stylesheet" type="text/css" href="/libs/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="/outils/header.css">
    <link rel="stylesheet" type="text/css" href="/libs/animate/css/animate.css">
    <link rel="stylesheet" type="text/css" href="/outils/<?= isset($css)? $css:''; ?>/css/<?= isset($css)? $css:''; ?>.css">
</head>
<body>
<div id="wrapper">
    <div class="header" class="row">
        <div class="nav2 row">
            <div class="wrapper-navigation row">
                <div class="navbar-logo pull-left">
                    <a href="/">
                       <span class="text-1">J</span>
                       <span class="text-2">oo</span>
                       <span class="text-3">Clix</span>
                    </a>
                </div>
                <div class="navbar-navigation pull-right">
                    <div class="nav-user row">
                        <div class="nav-user-wrapper">
                            <a href="/account/dashboard" class="nav-user-title-member">ChrisKuika</a>
                            <a href="">0.898$</a>
                            <a href=""><img src="/outils/Images/grid/refs.png" alt=""></a>
                            <a href=""><img src="/outils/Images/grid/account.png" alt=""></a>
                            <a href="/logout" class="btn-deconnection">Déconnexion</a>
                        </div>
                    </div>
                    <ul class="pull-right navigator-ul">
                        <li><a  class="navigator-earn nav-btn"> Earny Money <i class="fa fa-caret-down"></i></a></li>
                        <li><a href="/JooGrid" class="nav-btn">JooGrid</a></li>
                        <li><a href="/inscription.php" class="nav-btn-login">Inscription</a></li>
                        <li><a href="/connexion.php" class="nav-btn-login">Connexion</a></li>
                    </ul>
                </div>
            </div>
        </div> <!--end nav2-->
        <div class="header-repress"></div>
    </div> <!--fin header-->
    <div class="wrapper-article-content">
        <?php echo $page; ?>
    </div>
    <div class="back-modal"></div>
    <div class="deconnection">
        <div class="deconnection-wrapper">
            <div class="deconnection-title">
                Est-vous sûr ?
            </div>
            <div class="deconnection-btn row">
                <div class="deconnection-btn-a"><a onclick="deconnect(); return false;">Oui</a></div>
                <div class="deconnection-btn-b" onclick="CloseDeconnect(); return false;"><a href="">Non</a></div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="repress-footer"></div>
        <div class="footer-wrapper">

            <div class="page-footer row">
                <div class="child footer-copyright">
                    Jooclix © 2018. All rights reserved.
                </div>
                <div class="child">
                    <div class="footer-btn">
                        <a href="" class="greenLette">Conditions d'utilisation</a>
                        <a href="">Politique de Confidentialité</a>
                        <a href="">Aide</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div><!--end wrapper-->

<script type="text/javascript" src="/libs/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript" src="/libs/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="/libs/owlcarousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="/outils/header.js"></script>
<script type="text/javascript" src="/outils/connexion/js/keyboard.js"></script>
<script type="text/javascript" src="/outils/<?= isset($js)? $js:''; ?>/js/<?= isset($js)? $js:''; ?>.js"></script>
</body>
</html>