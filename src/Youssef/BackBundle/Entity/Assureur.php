<?php

namespace Youssef\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Assureur
 *
 * @ORM\Table(name="assureur")
 * @ORM\Entity(repositoryClass="Youssef\BackBundle\Repository\AssureurRepository")
 */
class Assureur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_assurance", type="string", length=255)
     */
    private $nomAssureur;

    /**
     * @var string
     *
     * @ORM\Column(name="mail_assureur", type="string", length=255)
     */
    private $emailAssureur;
    /**
     * Set id
     *
     * @param integer $id
     *
     * @return id
     */
    public function setId($medecin)
    {
        $this->id = $medecin;

        return $this;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set nomAssureur
     *
     * @param string $nomAssureur
     *
     * @return Assureur
     */

    public function setNomAssureur($nomAssureur)
    {
        $this->nomAssureur = $nomAssureur;

        return $this;
    }


    /**
     * Get nomAssureur
     *
     * @return string
     */
    public function getNomAssureur()
    {
        return $this->nomAssureur;
    }

    /**
     * Set emailAssureur
     *
     * @param string $emailAssureur
     *
     * @return Assureur
     */
    public function setEmailAssureur($emailAssureur)
    {
        $this->emailAssureur = $emailAssureur;

        return $this;
    }

    /**
     * Get emailAssureur
     *
     * @return string
     */
    public function getEmailAssureur()
    {
        return $this->emailAssureur;
    }
}
