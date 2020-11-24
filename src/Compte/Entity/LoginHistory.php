<?php
namespace Compte\Entity;


/**
 * @Table(name="login_history")
 * @Entity(repositoryClass="Compte\Repository\LoginHistoryRepository")
 */
class LoginHistory
{
    const BAD_CAPTCHA = 1;
    const BAD_COUNTRY = 2;
    const BAD_PASSWORD = 3;
    const USER_NOT_EXIST = 4;
    const SUCCESS_LOGIN = 5;

    /**
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(name="date_login", type="datetime")
     */
    protected $dateLogin;

    /**
     * @Column(name="request_code", type="string", length=30)
     */
    protected $requestCode;

    /**
     * @Column(name="comment", type="string", nullable=true)
     */
    protected $comment;

    /**
     * @Column(name="ip", type="string", length=12)
     */
    protected $ip;

    /**
     * @Column(name="member_id", type="integer")
     */
    protected $memberId;

    // todo: Il faudra mettre le nullable à false une fois en production
    /**
     * @ManyToOne(targetEntity="Core\Entity\Country")
     * @JoinColumn(nullable=true)
     */
    protected $country;


    public function __construct() {
        $this->dateLogin = new \DateTime();
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
     * Set dateLogin
     *
     * @param \DateTime $dateLogin
     *
     * @return LoginHistory
     */
    public function setDateLogin($dateLogin)
    {
        $this->dateLogin = $dateLogin;

        return $this;
    }

    /**
     * Get dateLogin
     *
     * @return \DateTime
     */
    public function getDateLogin()
    {
        return $this->dateLogin;
    }

    /**
     * Set requestCode
     *
     * @param string $requestCode
     *
     * @return LoginHistory
     */
    public function setRequestCode($requestCode)
    {
        $this->requestCode = $requestCode;

        return $this;
    }

    /**
     * Get requestCode
     *
     * @return string
     */
    public function getRequestCode()
    {
        return $this->requestCode;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return LoginHistory
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set memberId
     *
     * @param integer $memberId
     *
     * @return LoginHistory
     */
    public function setMemberId($memberId)
    {
        $this->memberId = $memberId;

        return $this;
    }

    /**
     * Get memberId
     *
     * @return integer
     */
    public function getMemberId()
    {
        return $this->memberId;
    }

    /**
     * Add country
     *
     * @param \Core\Entity\Country $country
     *
     * @return LoginHistory
     */
    public function addCountry(\Core\Entity\Country $country)
    {
        $this->country[] = $country;

        return $this;
    }

    /**
     * Remove country
     *
     * @param \Core\Entity\Country $country
     */
    public function removeCountry(\Core\Entity\Country $country)
    {
        $this->country->removeElement($country);
    }

    /**
     * Get country
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set country
     *
     * @param \Core\Entity\Country $country
     *
     * @return LoginHistory
     */
    public function setCountry(\Core\Entity\Country $country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return LoginHistory
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }
}
