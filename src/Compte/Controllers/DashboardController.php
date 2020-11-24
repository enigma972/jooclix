<?php

namespace Compte\Controllers;

use app\core\Http\HTTPRequest;
use app\core\Http\HTTPResponse;
use app\core\Kernel\Controller;

class DashboardController extends Controller
{
    public function executeDashboard(HTTPRequest $req, HTTPResponse $res){

        $this->render('Compte:layout.php', 'Compte:Compte/dashboard.php',
            array(
                'css' => 'dashboard',
                'title' => 'Dashboard '.$res->getSession('username'),
                'js' => 'dashboard'
            ));
    }

    public function executePersonnals(){

        $this->render('Compte:layout.php', 'Compte:Compte/personnals.php',
            array(
                'css' => 'personnals',
                'title' => 'personnals',
                'js' => 'personnals'
            ));
    }


    public function executeGrid(){

        $this->app->response()->addVar('css', 'grid');
        $this->app->response()->addVar('title', 'Joogrid');
        $this->app->response()->addVar('js', 'grid');

        $this->app->response()->render(__DIR__ . '/../../Home/Ressources/Views/layout.php', __DIR__.'/../Ressources/Views/Compte/joogrid.php');
    }

    public function executeBanners(){

        $this->app->response()->addVar('css', 'banners');
        $this->app->response()->addVar('title', 'Banners Jooclix Advertise');
        $this->app->response()->addVar('js', 'banners');

        $this->app->response()->render(__DIR__.'/../Ressources/Views/layout.php', __DIR__.'/../Ressources/Views/Compte/banners.php');
    }

    public function executePub(){

        $this->app->response()->addVar('css', 'pub');
        $this->app->response()->addVar('title', 'Vos Publicités Jooclix');
        $this->app->response()->addVar('js', 'pub');

        $this->app->response()->render(__DIR__.'/../Ressources/Views/layout.php', __DIR__.'/../Ressources/Views/Compte/pub.php');
    }

    public function executeAdvertise(){

        $this->app->response()->addVar('css', 'advertise');
        $this->app->response()->addVar('title', 'Vos advertise Jooclix');
        $this->app->response()->addVar('js', 'advertise');

        $this->app->response()->render(__DIR__.'/../Ressources/Views/layout.php', __DIR__.'/../Ressources/Views/Compte/advertise.php');
    }


    public function executeAddFunds(){

        $this->app->response()->addVar('css', 'addFunds');
        $this->app->response()->addVar('title', 'Add Funds Your Account Jooclix');
        $this->app->response()->addVar('js', 'addFunds');

        $this->app->response()->render(__DIR__.'/../Ressources/Views/layout.php', __DIR__.'/../Ressources/Views/Compte/addFunds.php');
    }

    public function executeRR(){

        $this->app->response()->addVar('css', 'rr');
        $this->app->response()->addVar('title', 'Purchase Referral RR');
        $this->app->response()->addVar('js', 'rr');

        $this->app->response()->render(__DIR__.'/../Ressources/Views/layout.php', __DIR__.'/../Ressources/Views/Compte/Referral_RR.php');
    }

    public function executeRD(){

        $this->app->response()->addVar('css', 'rd');
        $this->app->response()->addVar('title', 'Purchase Referral RD');
        $this->app->response()->addVar('js', 'rd');

        $this->app->response()->render(__DIR__.'/../Ressources/Views/layout.php', __DIR__.'/../Ressources/Views/Compte/Referral_RD.php');
    }

    public function executeRent_RD(){

        $this->app->response()->addVar('css', 'rentRD');
        $this->app->response()->addVar('title', 'Rent Referral RD');
        $this->app->response()->addVar('js', 'rentRD');

        $this->app->response()->render(__DIR__.'/../Ressources/Views/layout.php', __DIR__.'/../Ressources/Views/Compte/rent_rd.php');

    }

    public function executeRent_RR(){

        $this->app->response()->addVar('css', 'rentRR');
        $this->app->response()->addVar('title', 'Rent Referral RR');
        $this->app->response()->addVar('js', 'rentRR');

        $this->app->response()->render(__DIR__.'/../Ressources/Views/layout.php', __DIR__.'/../Ressources/Views/Compte/rent_rr.php');

    }

}