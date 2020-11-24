<?php
namespace Compte\DoctrineListener;

use app\core\DIC\Container;
use Compte\Mail\AccountActivationMailer;
use Compte\Entity\ActivationCode;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class MemberCreationListener
{
	/**
	 * @var Container
	 */
	protected $container;

	public function __construct(Container $container)
	{
		$this->container = $container;
	}

	public static function newInstance(Container $container) {
		return new self($container);
	}

	public function postPersist(LifecycleEventArgs $args)
	{
		$entity = $args->getObject();
		//$em = $args->getObjectManager()->

		if (!$entity instanceof ActivationCode) {
			return;
		}

		try{
            (new AccountActivationMailer($this->container->getMailer()))->sendActivationCode($entity);
        }catch (\Exception $e){
		    die(print ($e->getMessage()));
        }
	}
}