<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title><?= isset($title)? $title:'Home page'; ?></title>
    <link rel="stylesheet" type="text/css" href="/libs/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/libs/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="/outils/header.css">
    <link rel="stylesheet" type="text/css" href="/outils/dashboard/css/navboard.css">
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
                            <a href="" class="btn-deconnection">Déconnexion</a>
                        </div>
                    </div>
                    <ul class="pull-right navigator-ul">
                        <li><a  class="navigator-earn nav-btn"> Earny Money <i class="fa fa-caret-down"></i></a></li>
                        <li><a href="/JooGrid" class="nav-btn">JooGrid</a></li>
                        <li><a href="/view" class="nav-btn-login">View Ads</a></li>
                        <li><a href="/connexion" class="nav-btn-login">Add fonds</a></li>
                    </ul>
                </div>
            </div>
        </div> <!--end nav2-->
        <div class="header-repress"></div>
    </div> <!--fin header-->

        <div class="dashboard row">
            <div class="dashboard-wrapper">
                    <div class="dashboard-title">
                    	<span>
                    		Dashboard
                    	</span>
                    </div>
                    <ul class="dashboard-global">
                        <li class="dashboard-child-title">
                          Global
                        </li>
                        <li>
                            <a href="/account/dashboard"><i class="fa fa-home" ></i>Summary</a>
                        </li>
                        <li>
                            <a href="/account/add"><i class="fa fa-play"></i>Add fonds</a>
                        </li>
                        <li>
                            <a href="/account/pub"><i class="fa fa-sign-in"></i>Advertise</a>
                        </li>
                        <li>
                            <a href="/inscription.php"><i class="fa fa-user"></i>Upgrade Account</a>
                        </li>
                        <li>
                            <a href="/account/banners"><i class="fa fa-envelope"></i>Bannière</a>
                        </li>

                    </ul>

                    <ul class="dashboard-settings">
                        <li class="dashboard-child-title">
                            Settings
                        </li>
                        <li>
                            <a href="/account/personnals"><i class="fa fa-gears" ></i> Personnal settings</a>
                        </li>
                        <li>
                            <a href="/prepare.php"><i class="fa fa-gear"></i> Forum settings</a>
                        </li>
                        <li>
                            <a href="/inscription.php"><i class="fa fa-sign-in"></i> CONNEXION</a>
                        </li>
                        <li>
                            <a href="/inscription.php"><i class="fa fa-user"></i> INSCRIPTION</a>
                        </li>
                        <li>
                            <a href="/contact.php"><i class="fa fa-envelope"></i> CONTACT</a>
                        </li>
                    </ul>

                    <ul class="dashboard-referrals">
                        <li class="dashboard-child-title">
                            Referrals
                        </li>
                        <li>
                            <a href="/account/rentrd"><i class="fa fa-users" ></i> Directed Referrals</a>
                        </li>
                        <li>
                            <a href="/account/rentrr"><i class="fa fa-user"></i> Rented Referrals</a>
                        </li>
                        <li>
                            <a href="/inscription.php"><i class="fa fa-bar-chart"></i> Rent Referrals </a>
                        </li>
                        <li>
                            <a href="/account/rr"><i class="fa fa-cart-plus"></i> By Referrals</a>
                        </li>

                    </ul>

                    <ul class="dashboard-logs">
                        <li class="dashboard-child-title">
                            Logs
                        </li>
                        <li>
                            <a href="/"><i class="fa fa-users" ></i> Deposit History</a>
                        </li>
                        <li>
                            <a href="/prepare.php"><i class="fa fa-calculator"></i> Calculator</a>
                        </li>
                        <li>
                            <a href="/prepare.php"><i class="fa fa-long-arrow-right"></i> Déconnexion</a>
                        </li>
                    </ul>
            </div><!--end dashboard-wrapper-->

            <div class="pull-right" style="width: 80%; ">
                <div class="dashboard-envelop">
                    <?php echo $page; ?>
                </div><!--end dashboard-envelop-->
            </div>
        </div><!-- end dashboard-->
    <div class="back-modal"></div>
    <div class="deconnection">
        <div class="deconnection-wrapper">
            <div class="deconnection-title">
                Est-vous sûr ?
            </div>
            <div class="deconnection-btn row">
                <div class="deconnection-btn-a"><a href="" onclick="deconnect(); return false;">Oui</a></div>
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
<script type="text/javascript" src="/libs/bootstrap/js/bootstrap-checkbox.js"></script>
<script type="text/javascript" src="/outils/header.js"></script>
<script type="text/javascript" src="/outils/<?= isset($js)? $js:''; ?>/js/<?= isset($js)? $js:''; ?>.js"></script>
</body>
</html>