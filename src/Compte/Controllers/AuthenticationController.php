<?php

namespace Compte\Controllers;


use Compte\DoctrineListener\MemberCreationListener;
use Compte\Entity\ActivationCode;
use app\core\Http\HTTPResponse;
use app\core\Kernel\Controller;
use app\core\Http\HTTPRequest;
use Compte\Entity\LoginHistory;
use Compte\Entity\MemberType;
use Compte\Entity\Member;
use Compte\Entity\Member as Parrain;
use Core\Entity\Role;
use Doctrine\ORM\Events;


class AuthenticationController extends Controller
{
    public function executeConnexion(HTTPRequest $req, HTTPResponse $res)
    {
        if ($this->app->user()->isAuthenticated()) {
            if (null !== $req->server('http_referer')) {
                $res->redirect($req->server('http_referer'));
            } else {
                $res->redirect('/account/dashboard');
            }
        } else {
            if ($req->isAjax()) {
                if ($req->postExist('username') && $req->postExist('password'))/* && $req->postExist('captcha'))*/ {
                    // On vérifie l'existance de la reponse du captcha dans la session en ajoutant << $res->sessionExist('captcha') >>
                    if ($req->post('captcha') == $res->getSession('captcha')) {
                        $em = $this->container->getEntityManager();
                        $member = $em->getRepository(Member::class)->getMemberForConnect($req->post('username'));

                        if (!empty($member)) {
                            if ($this->isValidePassword($req->post('password'), $member['password'])) {
                                $this->app->user()->setAuthenticated(true);
                                $this->app->user()->setAttribute('id', $member['id']);
                                $this->app->user()->setAttribute('username', $member['username']);
                                $this->app->user()->setAttribute('role', $member['role_id']);
                                $this->app->user()->setAttribute('type', $member['member_type']);
                                $this->app->user()->setAttribute('account_state', $member['account_state']);
                                /**
                                 * $this->app->user()->setAttribute('country', $geoLocationApi->getCountry());
                                 */

                                $log = new LoginHistory();
                                $log->setMemberId($member['id'])
                                    ->setRequestCode(LoginHistory::SUCCESS_LOGIN)
                                    ->setIp($req->server('remote_addr')
                                    );

                                $em->persist($log);

                                $em->flush();


                                //$res->redirect('/account/dashboard');
                                $res->response('Vous étès connecté');
                            } else {
                                $res->response('Mot de passe incorrect');
                            }
                        } else {
                            $res->response('Aucun compte ne correspond à ce username');
                        }
                    } else {
                        $res->response('Captcha incorrect');
                    }
                } else {
                    $res->response('Veuillez remplir tout les champs');
                }
            } else {
                $this->render('Home:layout.php', 'Compte:Auth/connexion.php',
                    array(
                        'css' => 'connexion',
                        'title' => 'connexion',
                        'js' => 'connexion'
                    ));
            }
        }
    }

    public function executeInscription(HTTPRequest $req, HTTPResponse $res)
    {
        if ($this->app->user()->isAuthenticated()) {
            if (null != $req->server('http_referer')) {
                $res->redirect($req->server('http_referer'));
            } else {
                $res->redirect('/account/dashboard');
            }
        } else {
            if ($req->isAjax()) {
                if ($req->post('accepter_tos') == 'on') {
                    if ($req->post('captcha') == $res->getSession('captcha')) {
                        $em = $this->container->getEntityManager();

                        // todo: Il faut que cette assignation soit faites par géolocalisation
                        /**************************************************************************
                         * ************************************************************************
                         * *            $country = $geoLocationApi->getCountry();                 *
                         * ************************************************************************
                         **************************************************************************/

                        $country = $em->getRepository('Core\Entity\Country')->findOneBySlug('RDC');

                        if (!empty($country->getName())) {

                            if ($req->postExist('fullname')) {

                                if (strlen($req->post('password')) >= 6) {

                                    if (filter_var($req->post('email'), FILTER_VALIDATE_EMAIL) !== false) {

                                        if ($req->postExist('username')) {

                                            if (!$em->getRepository('Compte\Entity\Member')->MemberExist($req->post('username'))) {
                                                $role = $em->getRepository('Core\Entity\Role')->findOneById(Role::MEMBER);
                                                $memberType = $em->getRepository('Compte\Entity\MemberType')->findOneById(MemberType::STD);
                                                $parrain = $em->getRepository('Compte\Entity\Member')->getMemberForGodFathering($req->post('parrain'));

                                                if ($parrain instanceof Member) {
                                                    require_once $this->app->config()->app_root() . 'swiftmailer/swiftmailer/lib/swift_required.php';
                                                    $this->container->getEventManager()->addEventListener(
                                                        [Events::postPersist],
                                                        MemberCreationListener::newInstance($this->container)
                                                    );

                                                    $activationCode = new ActivationCode();
                                                    $member = new Member();

                                                    $member->setUsername($req->post('username'))
                                                        ->setFullname($req->post('fullname'))
                                                        ->setPassword($req->post('password'))
                                                        ->setMemberType($memberType)
                                                        ->setRole($role)
                                                        ->setEmail($req->post('email'))
                                                        ->setCountry($country)
                                                        ->setParrain($parrain);

                                                    $activationCode->setMember($member);

                                                    // Pas besoin de faire un persist sur member car j'ai cascadé
                                                    // l'action persist du code d'activation sur le membre
                                                    $em->persist($activationCode);

                                                    $em->flush();

                                                    //$this->app->user()->setFlash('Un mail contenant le code d\'activation de votre Compte vous a été envoyé');

                                                    //$res->response('10');
                                                } else {
                                                    // Un problème interne au serveur
                                                    $res->response('9');
                                                }
                                            } else {
                                                // L'Utilisateur existe déjà
                                                $res->response('8');
                                            }
                                        } else {
                                            // Champ username vide
                                            $res->response('7');
                                        }
                                    } else {
                                        // Email non valide
                                        $res->response('6');
                                    }
                                } else {
                                    // Taille du password inferieur à 6
                                    $res->response('5');
                                }
                            } else {
                                // Le champ Fullname vide
                                $res->response('4');
                            }
                        } else {
                            // Country Invalide
                            $res->response('3');
                        }
                    } else {
                        // Captcha invalide
                        $res->response('2');
                    }
                } else {
                    // TOS non coché
                    $res->response('1');
                }
            } else {
                $this->render('Home:layout.php', 'Compte:Auth/inscription.php',
                    array(
                        'css' => 'inscription',
                        'title' => 'Free Singup To Jooclix',
                        'js' => 'inscription'
                    ));
            }
        }
    }

    /**
     * @param HTTPRequest $req
     * @param HTTPResponse $res
     */
    public function executeActivateAccount(HTTPRequest $req, HTTPResponse $res)
    {
        if ($this->app->user()->isAuthenticated()) {
            if (null != $req->server('http_referer')) {
                $res->redirect($req->server('http_referer'));
            } else {
                $res->redirect('/account/dashboard');
            }
        } else {
            if ($req->isAjax()) {
                if (!empty($req->post('resend'))) {
                    if (filter_var($req->post('email'), FILTER_VALIDATE_EMAIL) !== false) {
                        $member = $this->container->getRepository(Member::class)->findOneBy(array('email' => $req->post('email')));

                        if ($member instanceof Member) {
                            if ($member->getAccountState() == false) {
                                // On renvoi le code d'activation
                                $activationCode = new ActivationCode();
                                $activationCode->setMember($member);
                                $em = $this->container->getEntityManager();

                                // On le persiste dans Doctrine
                                $em->persist($activationCode);

                                // On enregistre le tout
                                $em->flush();
                                $res->response('Veillez ouvrir votre boite mail');
                            } else {
                                $res->response('Le compte lié à cette email est déjà activé');
                            }
                        } else {
                            $res->response('Aucun compte ne correspond à cette email');
                        }
                    } else {
                        $res->response('L\'email entré est invalide');
                    }
                } else {
                    if ($req->post('captcha') == $res->getSession('captcha')) {
                        if (filter_var($req->post('email'), FILTER_VALIDATE_EMAIL) !== false) {
                            if (!empty($req->post('act_code'))) {
                                $activationCode = $this->container->getRepository(ActivationCode::class)->getCodeForVerification($req->post('email'), $req->post('act_code'));

                                if ($activationCode instanceof ActivationCode) {
                                    if ($activationCode->isValide()) {
                                        $activationCode->validate();

                                        $this->container->getEntityManager()->flush();
                                        $res->response('Votre compte est validé, veillez vous connectez');
                                    } else {
                                        $res->response('Ce code n\'est pas valide');
                                    }
                                } else {
                                    $res->response('Le code ou l\'email entrée n\'est pas valide, assurer vous que votre compte n\'est pas déjà activé');
                                }
                            } else {
                                $res->response('Le code n\'est peut pas être vide');
                            }
                        } else {
                            $res->response('L\'email entrée est invalide');
                        }
                    } else {
                        $res->response('Le captcha entré est invalide');
                    }
                }
            } else {
                $this->render('Home:layout.php', 'Compte:Auth/activation.php',
                    array(
                        'css' => 'connexion',
                        //'js' => 'connexion',
                        'title' => 'Activation Account',
                        'js' => 'activationaccount'
                    ));
            }
        }
    }

    public function executeLogout(HTTPRequest $req, HTTPResponse $res)
    {
        if ($this->app->user()->isAuthenticated()) {
            $this->app->user()->setAuthenticated(false);
            $_SESSION = null;
            session_destroy();
            $res->redirect('/connexion.php');
        } else {
            if (null != $req->server('http_referer')) {
                $res->redirect($req->server('http_referer'));
            } else {
                $res->redirect('/');
            }
        }
    }
}