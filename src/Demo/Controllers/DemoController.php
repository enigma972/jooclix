<?php

namespace Demo\Controllers;

use app\core\Http\HTTPRequest;
use app\core\Http\HTTPResponse;
use app\core\Kernel\Controller;
use Compte\Entity\ActivationCode;
use Compte\Entity\Member;
use Compte\Entity\MemberType;
use Core\Entity\Country;
use Core\Entity\Role;

class DemoController extends Controller
{
    public function executeIndex(HTTPRequest $request, HTTPResponse $response)
    {
        $response->addVar('title', 'Welcome');
        $response->render(__DIR__ . '/../Ressources/Views/layout.php', __DIR__ . '/../Ressources/Views/Demo/index.php');
    }

    public function executeLogin(HTTPRequest $request, HTTPResponse $response)
    {
        $response->addVar('title', 'Login');

        if ($request->isMethod('POST')) {
            if ($request->postExist('name') && $request->postExist('pass')) {
                if ($request->post('name') == 'user' && $request->post('pass') == 'pass') {
                    $response->setSession('connected', true);
                }
            }
        }

        if ($request->isMethod('GET')) {
            if ($request->get('logout') == true)
                $response->setSession('connected', null);
        }
        $response->render(__DIR__ . '/../Ressources/Views/layout.php', __DIR__ . '/../Ressources/Views/Demo/login.php');
    }

    public function executeHello(HTTPRequest $request, HTTPResponse $response)
    {
        $response->addVar('name', $request->get('name'));
        $response->addVar('title', 'Hello' . ' ' . $request->get('name'));

        $response->render(__DIR__ . '/../Ressources/Views/layout.php', __DIR__ . '/../Ressources/Views/Demo/hello.php');

    }

    public function executeTest(HTTPRequest $request, HTTPResponse $response) {
/**        //die(var_dump($this->container->getRepository('Compte\Entity\Member')->find(1)));
        $memberType = new MemberType();
        $activationCode = new ActivationCode();
        $country = new Country();
        $member = new Member();
        $role = new Role();


        $country->setName('Congo, Kinshasa')->setSlug('RDC');
        //$activationCode->setMember($member);

        $member->setUsername('enigma97')
                ->setFullname('joellusavuvu')
                ->setPassword('hightech')
                ->setAccountState(true)
                ->setMemberType($memberType)
                ->setRole($role)
                ->setEmail('joellusavuvu@gmail.com')
                ->setCountry($country)
                ->setParrain($member)
                ->addDirectReferral($member)
                ->addDirectReferral($member);


        $em = $this->container->getEntityManager();

        //$em->flush();

        $email = 'lusavuvujoel39@gmail.coml';
        $code = 'ad45bc';
        $activationCode = $em->getRepository(ActivationCode::class)->getCodeForVerification($email, $code);
        if ($activationCode instanceof ActivationCode)
            die(var_dump($activationCode->isValide()));*/


        die(var_dump($_SESSION));

    }
}