<?php
namespace Compte\Entity;

/**
 * @Table(name="member_type")
 * @Entity(repositoryClass="Compte\Repository\MemberTypeRepository")
 */
class MemberType
{
    /* Ces constantes doivent correspondre aux Ids de la Table member_type */
    const STD = 1;
    const GLD = 2;
    const PMM = 3;

    /**
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(name="slug", type="string", length=10, unique=true)
     */
    protected $slug;

    /**
     * @Column(name="name", type="string", length=30, unique=true)
     */
    protected $name;

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
     * Set slug
     *
     * @param string $slug
     *
     * @return MemberType
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return MemberType
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
