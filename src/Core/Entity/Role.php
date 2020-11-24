<?php
namespace Core\Entity;

use Doctrine\Common\Annotations\Annotation;

/**
 * @Table(name="role")
 * @Entity(repositoryClass="Core\Repository\RepositoryRole")
 */
class Role
{
    const ADMIN = 1;
    const MEMBER = 2;

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
     * @Column(name="name", type="string", length=15, unique=true)
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
     * @return Role
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
     * @return Role
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
