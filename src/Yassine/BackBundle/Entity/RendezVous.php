<?php

namespace Yassine\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RendezVous
 *
 * @ORM\Table(name="rendez_vous")
 * @ORM\Entity
 */
class RendezVous
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_rendez_vous", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRendezVous;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_expert", type="integer", nullable=false)
     */
    private $idExpert;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_client", type="integer", nullable=false)
     */
    private $idClient;

    /**
     * @var string
     *
     * @ORM\Column(name="date_rendez_vous", type="string", length=255, nullable=false)
     */
    private $dateRendezVous;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_rendez_vous", type="string", length=255, nullable=false)
     */
    private $lieuRendezVous;

    /**
     * @var integer
     *
     * @ORM\Column(name="etat", type="integer", nullable=false)
     */
    private $etat;



    /**
     * Get idRendezVous
     *
     * @return integer
     */
    public function getIdRendezVous()
    {
        return $this->idRendezVous;
    }

    /**
     * Set idExpert
     *
     * @param integer $idExpert
     *
     * @return RendezVous
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
     * @return RendezVous
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
     * @param string $dateRendezVous
     *
     * @return RendezVous
     */
    public function setDateRendezVous($dateRendezVous)
    {
        $this->dateRendezVous = $dateRendezVous;

        return $this;
    }

    /**
     * Get dateRendezVous
     *
     * @return string
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
     * @return RendezVous
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
     * @return RendezVous
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
