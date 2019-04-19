<?php

namespace AmineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Desabonnement
 *
 * @ORM\Table(name="desabonnement")
 * @ORM\Entity
 */
class Desabonnement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_souscription", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSouscription;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_client", type="integer", nullable=false)
     */
    private $idClient;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_assureur", type="integer", nullable=false)
     */
    private $idAssureur;



    /**
     * Get idSouscription
     *
     * @return integer
     */
    public function getIdSouscription()
    {
        return $this->idSouscription;
    }

    /**
     * Set idClient
     *
     * @param integer $idClient
     *
     * @return Desabonnement
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
     * Set idAssureur
     *
     * @param integer $idAssureur
     *
     * @return Desabonnement
     */
    public function setIdAssureur($idAssureur)
    {
        $this->idAssureur = $idAssureur;

        return $this;
    }

    /**
     * Get idAssureur
     *
     * @return integer
     */
    public function getIdAssureur()
    {
        return $this->idAssureur;
    }
}
