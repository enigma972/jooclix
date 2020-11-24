<?php
namespace Compte\Mail;


use Compte\Entity\ActivationCode;

class AccountActivationMailer
{
	/**
	 * @var Swift_Mailer
	 */
	protected $mailer;
	
	public function __construct(\Swift_Mailer $mailer)
	{
		$this->mailer = $mailer;
	}

	public function sendActivationCode(ActivationCode $activationCode) {
		$message = (\Swift_Message::newInstance())
            ->setSubject('Code d\'activation de votre compte Jooclix')
            ->addTo(
                $activationCode->getMember()->getUsername(),//->getEmail(),
                $activationCode->getMember()->getUsername()
            )
            ->addFrom('no-reply@jooclix.com')
            ->setBody('Le corps du Message', 'text/html');

        $this->mailer->send($message);
	}
}