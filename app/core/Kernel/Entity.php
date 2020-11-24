<?php
/**
 * Created by PhpStorm.
 * User: Lusavuvu
 * Date: 12/01/2018
 * Time: 17:36
 */

namespace app\core\Kernel;


/**
 * Class Entity
 * @package app\core\Kernel
 */
class Entity implements \ArrayAccess
{
    /**
     * @var array
     */
    protected $errors = array();
    /**
     * @var
     */
    protected $id;

    /**
     * Entity constructor.
     * @param array $donnees
     */
    public function __construct(array $donnees = array())
    {
        if (!empty($donnees)) {
            $this->hydrate($donnees);
        }
    }

    /**
     * @param array $donnees
     */
    protected function hydrate(array $donnees)
    {
        foreach ($donnees as $attribut => $valeur) {
            $methode = 'set' . ucfirst($attribut);
            if (is_callable(array($this, $methode))) {
                $this->$methode($valeur);
            }
        }
    }

    /**
     * @return array
     */
    public function errors()
    {
        return $this->errors;
    }

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = (int)$id;
    }

    /**
     * @param mixed $var
     * @return mixed
     */
    public function offsetExists($var)
    {
        return isset($this->$var) && is_callable(array($this, $var));
    }

    /**
     * @param mixed $var
     * @return mixed
     */
    public function offsetGet($var)
    {
        if (isset($this->$var) && is_callable(array($this, $var))) {
            return $this->$var();
        }
    }

    /**
     * @param mixed $var
     * @param mixed $value
     * @return mixed
     */
    public function offsetSet($var, $value)
    {
        $method = 'set' . ucfirst($var);
        if (isset($this->$var) && is_callable(array($this, $method))) {
            $this->$method($value);
        }
    }

    /**
     * @param mixed $var
     * @throws \Exception
     */
    public function offsetUnset($var)
    {
        throw new \Exception('Impossible de supprimer une quelconque valeur');
    }
}