<?php
namespace Compte\Entity;

use Compte\Entity\Member as DirectReferral;
use Compte\Entity\MemberType;
use Core\Entity\Country;
use Core\Entity\Role;
use Compte\Entity\Member as Parrain;
use Doctrine\Common\Annotations\Annotation;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @table(name="member")
 * @Entity(repositoryClass="Compte\Repository\MemberRepository")
 */
class Member
{


    /**
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(name="username", type="string", length=15, unique=true)
     */
    protected $username;

    /**
     * @Column(name="fullname", type="string", length=30)
     */
    protected $fullname;

    /**
     * @Column(name="password", type="string", length=100)
     */
    protected $password;

    /**
     * @Column(name="secret_code", type="string", length=6, nullable=true)
     */
    protected $secretCode;

    /**
     * @Column(name="email", type="string", length=30, unique=true)
     */
    protected $email;

    /**
     * @ManyToOne(targetEntity="Core\Entity\Country")
     * @JoinColumn(nullable=false)
     */
    protected $country;

    /**
     * @ManyToOne(targetEntity="Compte\Entity\MemberType")
     * @JoinColumn(name="member_type_id", nullable=false)
     */
    protected $memberType;

    /**
     * @ManyToOne(targetEntity="Core\Entity\Role")
     * @JoinColumn(nullable=false)
     */
    protected $role;

    /**
     * @Column(name="date_inscription", type="datetime")
     */
    protected $dateInscription;

    /**
     * @Column(name="account_state", type="boolean", options={"default"=false}, nullable=false)
     */
    protected $accountState;

    /**
     * @ManyToOne(targetEntity="Compte\Entity\Member")
     * @JoinColumn(nullable=false)
     */
    protected $parrain;

    /**
     * @OneToMany(targetEntity="Compte\Entity\Member", mappedBy="parrain")
     */
    protected $directReferrals;


    /**
     * Member constructor.
     */
    public function __construct() {
        $this->directReferrals = new ArrayCollection();
        $this->dateInscription = new \DateTime();
        $this->accountState = false;
    }

    public function setPassword($password, $algorithme = PASSWORD_BCRYPT, array $options = ['cost' => 9]) {
        $this->password = password_hash($password, $algorithme, $options);

        return $this;
    }

    public function isActivatedAccount() {
        return $this->getAccountState();
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
     * Set username
     *
     * @param string $username
     *
     * @return Member
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set fullname
     *
     * @param string $fullname
     *
     * @return Member
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get fullname
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Member
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set dateInscription
     *
     * @param \DateTime $dateInscription
     *
     * @return Member
     */
    public function setDateInscription(\DateTime $dateInscription)
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    /**
     * Get dateInscription
     *
     * @return \DateTime
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    /**
     * Set role
     *
     * @param Role $role
     *
     * @return Member
     */
    public function setRole(Role $role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return Role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set parrain
     *
     * @param DirectReferral $parrain
     *
     * @return Member
     */
    public function setParrain(Parrain $parrain)
    {
        $this->parrain = $parrain;

        return $this;
    }

    /**
     * Get parrain
     *
     * @return DirectReferral
     */
    public function getParrain()
    {
        return $this->parrain;
    }

    /**
     * Set country
     *
     * @param Country $country
     *
     * @return Member
     */
    public function setCountry(Country $country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set accountState
     *
     * @param boolean $accountState
     *
     * @return Member
     */
    public function setAccountState($accountState)
    {
        $this->accountState = $accountState;

        return $this;
    }

    /**
     * Get accountState
     *
     * @return boolean
     */
    public function getAccountState()
    {
        return $this->accountState;
    }

    /**
     * Set memberType
     *
     * @param MemberType $memberType
     *
     * @return Member
     */
    public function setMemberType(MemberType $memberType)
    {
        $this->memberType = $memberType;

        return $this;
    }

    /**
     * Get memberType
     *
     * @return MemberType
     */
    public function getMemberType()
    {
        return $this->memberType;
    }

    /**
     * Add directReferral
     *
     * @param DirectReferral $directReferral
     *
     * @return Member
     */
    public function addDirectReferral(DirectReferral $directReferral)
    {
        $this->directReferrals[] = $directReferral;

        return $this;
    }

    /**
     * Remove directReferral
     *
     * @param DirectReferral $directReferral
     */
    public function removeDirectReferral(DirectReferral $directReferral)
    {
        $this->directReferrals->removeElement($directReferral);
    }

    /**
     * Get directReferrals
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDirectReferrals()
    {
        return $this->directReferrals;
    }

    /**
     * Set secretCode
     *
     * @param string $secretCode
     *
     * @return Member
     */
    public function setSecretCode($secretCode)
    {
        $this->secretCode = $secretCode;

        return $this;
    }

    /**
     * Get secretCode
     *
     * @return string
     */
    public function getSecretCode()
    {
        return $this->secretCode;
    }
}
