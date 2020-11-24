<?php

namespace Home\Controllers;

use app\core\Http\HTTPRequest;
use app\core\Http\HTTPResponse;
use app\core\Kernel\Controller;
use Compte\Entity\ActivationCode;
use Compte\Entity\Member;
use Compte\Entity\MemberType;
use Core\Entity\Country;
use Core\Entity\Role;

class HomeController extends Controller
{
	public function executeIndex(){
	  
	    $this->app->response()->addVar('css', 'home');
	    $this->app->response()->addVar('title', 'Home Page');
	    $this->app->response()->addVar('js', 'home');

	    try{
			$this->app->response()->render(__DIR__.'/../Ressources/Views/layout.php', __DIR__.'/../Ressources/Views/Home/index.php');
		}catch(\RuntimeException $e){
		    var_dump($e->getTrace()[0]);

			exit('Le Layout ou la vue que vous avez démandé sont introuvables ou ont été supprimé');
		}
	}

    public function executeProof(){

        $this->app->response()->addVar('css', 'proof');
        $this->app->response()->addVar('title', 'Jooclix Proof');
        $this->app->response()->addVar('js', 'proof');

        try{
            $this->app->response()->render(__DIR__.'/../Ressources/Views/layout.php', __DIR__.'/../Ressources/Views/Home/proof.php');
        }catch(\RuntimeException $e){
            var_dump($e->getTrace()[0]);

            exit('Le Layout ou la vue que vous avez démandé sont introuvables ou ont été supprimé');
        }
    }


     public function executeView(){

        $this->app->response()->addVar('css', 'view');
        $this->app->response()->addVar('title', 'Jooclix view');
        $this->app->response()->addVar('js', 'view');

        try{
            $this->app->response()->render(__DIR__.'/../Ressources/Views/layout.php', __DIR__.'/../Ressources/Views/Home/view.php');
        }catch(\RuntimeException $e){
            var_dump($e->getTrace()[0]);

            exit('Le Layout ou la vue que vous avez démandé sont introuvables ou ont été supprimé');
        }
    }
}