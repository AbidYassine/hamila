<?php

namespace AmineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demande
 *
 * @ORM\Table(name="demande")
 * @ORM\Entity
 */
class Demande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_demande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDemande;

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
     * @var string
     *
     * @ORM\Column(name="type_demande", type="string", length=255, nullable=false)
     */
    private $typeDemande;

    /**
     * @var string
     *
     * @ORM\Column(name="comentaire_demande", type="text", length=65535, nullable=false)
     */
    private $comentaireDemande;

    /**
     * @var string
     *
     * @ORM\Column(name="date_demande", type="string", length=255, nullable=false)
     */
    private $dateDemande;



    /**
     * Get idDemande
     *
     * @return integer
     */
    public function getIdDemande()
    {
        return $this->idDemande;
    }

    /**
     * Set idClient
     *
     * @param integer $idClient
     *
     * @return Demande
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
     * @return Demande
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

    /**
     * Set typeDemande
     *
     * @param string $typeDemande
     *
     * @return Demande
     */
    public function setTypeDemande($typeDemande)
    {
        $this->typeDemande = $typeDemande;

        return $this;
    }

    /**
     * Get typeDemande
     *
     * @return string
     */
    public function getTypeDemande()
    {
        return $this->typeDemande;
    }

    /**
     * Set comentaireDemande
     *
     * @param string $comentaireDemande
     *
     * @return Demande
     */
    public function setComentaireDemande($comentaireDemande)
    {
        $this->comentaireDemande = $comentaireDemande;

        return $this;
    }

    /**
     * Get comentaireDemande
     *
     * @return string
     */
    public function getComentaireDemande()
    {
        return $this->comentaireDemande;
    }

    /**
     * Set dateDemande
     *
     * @param string $dateDemande
     *
     * @return Demande
     */
    public function setDateDemande($dateDemande)
    {
        $this->dateDemande = $dateDemande;

        return $this;
    }

    /**
     * Get dateDemande
     *
     * @return string
     */
    public function getDateDemande()
    {
        return $this->dateDemande;
    }
}
