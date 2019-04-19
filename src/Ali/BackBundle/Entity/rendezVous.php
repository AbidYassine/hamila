<?php

namespace Ali\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * rendezVous
 *
 * @ORM\Table(name="rendez_vous")
 * @ORM\Entity(repositoryClass="Ali\BackBundle\Repository\rendezVousRepository")
 */
class rendezVous
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_rendez_vous", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    public function __construct()
    {
        $this->etat =0;
    }
    /**
     * @var int
     *
     * @ORM\Column(name="id_expert", type="integer")
     */
    private $idExpert;

    /**
     * @var int
     *
     * @ORM\Column(name="id_client", type="integer")
     */
    private $idClient;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_rendez_vous", type="date")
     */
    private $dateRendezVous;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_rendez_vous", type="string", length=255)
     */
    private $lieuRendezVous;

    /**
     * @var int
     *
     * @ORM\Column(name="etat", type="integer")
     */
    private $etat;



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
     * Set idExpert
     *
     * @param integer $idExpert
     *
     * @return rendezVous
     */
    public function setIdExpert($idExpert)
    {
        $this->idExpert = $idExpert;

        return $this;
    }

    /**
     * Get idExpert
     *
     * @return integer
     */
    public function getIdExpert()
    {
        return $this->idExpert;
    }

    /**
     * Set idClient
     *
     * @param integer $idClient
     *
     * @return rendezVous
     */
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;

        return $this;
    }

    /**
     * Get idClient
     *
     * @return integer
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * Set dateRendezVous
     *
     * @param \DateTime $dateRendezVous
     *
     * @return rendezVous
     */
    public function setDateRendezVous($dateRendezVous)
    {
        $this->dateRendezVous = $dateRendezVous;

        return $this;
    }

    /**
     * Get dateRendezVous
     *
     * @return \DateTime
     */
    public function getDateRendezVous()
    {
        return $this->dateRendezVous;
    }

    /**
     * Set lieuRendezVous
     *
     * @param string $lieuRendezVous
     *
     * @return rendezVous
     */
    public function setLieuRendezVous($lieuRendezVous)
    {
        $this->lieuRendezVous = $lieuRendezVous;

        return $this;
    }

    /**
     * Get lieuRendezVous
     *
     * @return string
     */
    public function getLieuRendezVous()
    {
        return $this->lieuRendezVous;
    }

    /**
     * Set etat
     *
     * @param integer $etat
     *
     * @return rendezVous
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return integer
     */
    public function getEtat()
    {
        return $this->etat;
    }
}
