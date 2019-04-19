<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $nom;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;
    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }
    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }
    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }


    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @var string
     *
     * @ORM\Column(name="blocked", type="string", length=255, nullable=true)
     */
    private $blocked;

    /**
     * @return string
     */
    public function getBlocked()
    {
        return $this->blocked;
    }

    /**
     * @param string $blocked
     */
    public function setBlocked($blocked)
    {
        $this->blocked = $blocked;
    }

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}