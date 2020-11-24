<?php

namespace Compte\Entity;

use Compte\Entity\Member;
use Doctrine\Common\Annotations\Annotation;

/**
 * @Table(name="activation_code")
 * @Entity(repositoryClass="Compte\Repository\ActivationCodeRepository")
 * @HasLifecycleCallbacks
 */
class ActivationCode
{
    /**
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ManyToOne(targetEntity="Compte\Entity\Member", cascade={"persist"})
     * @JoinColumn(nullable=false)
     */
    protected $member;

    /**
     * @Column(name="code", type="string", length=6)
     */
    protected $code;

    /**
     * @Column(name="validity", type="datetime")
     */
    protected $validity;

    /**
     * @Column(name="used", type="boolean")
     */
    protected $used;

    /**
     * ActivationCode constructor.
     */
    public function __construct()
    {
        $this->validity = new \DateTime();
        $this->setValidity();
        $this->used = false;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set validity
     *
     * @param \DateTime|string $validity
     * @return ActivationCode
     */
    public function setValidity($validity = 'P4D')
    {
        $this->validity->add(new \DateInterval($validity));

        return $this;
    }

    /**
     * Get validity
     *
     * @return \DateTime
     */
    public function getValidity()
    {
        return $this->validity;
    }

    /**
     * Set member
     *
     * @param Member $member
     *
     * @return ActivationCode
     */
    public function setMember(Member $member)
    {
        $this->member = $member;
        $this->generateCode();

        return $this;
    }

    /**
     * Get member
     *
     * @return Member
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return ActivationCode
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set used
     *
     * @param boolean $used
     *
     * @return ActivationCode
     */
    public function setUsed($used)
    {
        $this->used = $used;

        return $this;
    }

    /**
     * Get used
     *
     * @return boolean
     */
    public function getUsed()
    {
        return $this->used;
    }

    /**
     * this method generate the activationCode
     */
    protected function generateCode()
    {
        $this->setCode(substr(sha1(uniqid()), 0, 6));
    }

    /**
     * Verify if this ActivationCode is again valide
     *
     * @return bool
     */
    public function isValide()
    {
        if ($this->getValidity() > new \DateTime())
            return true;
        return false;
    }

    public function validate()
    {
        $this->used = true;
        if ($this->member instanceof Member)
            $this->member->setAccountState(true);
    }
}
