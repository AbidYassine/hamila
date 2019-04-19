<?php

namespace Yassine\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Souscription
 *
 * @ORM\Table(name="souscription")
 * @ORM\Entity
 */
class Souscription
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
     * @ORM\Column(name="id_offre", type="integer", nullable=false)
     */
    private $idOffre;

    /**
     * @var integer
     *
     * @ORM\Column(name="nombre_tranche", type="integer", nullable=false)
     */
    private $nombreTranche;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_enfants", type="integer", nullable=true)
     */
    private $nbEnfants;

    /**
     * @var boolean
     *
     * @ORM\Column(name="conjoint", type="boolean", nullable=true)
     */
    private $conjoint;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_souscription", type="date", nullable=false)
     */
    private $dateSouscription;

    /**
     * @var float
     *
     * @ORM\Column(name="montant", type="float", precision=10, scale=0, nullable=false)
     */
    private $montant;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="blob", nullable=true)
     */
    private $image;



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
     * @return Souscription
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
     * Set idOffre
     *
     * @param integer $idOffre
     *
     * @return Souscription
     */
    public function setIdOffre($idOffre)
    {
        $this->idOffre = $idOffre;

        return $this;
    }

    /**
     * Get idOffre
     *
     * @return integer
     */
    public function getIdOffre()
    {
        return $this->idOffre;
    }

    /**
     * Set nombreTranche
     *
     * @param integer $nombreTranche
     *
     * @return Souscription
     */
    public function setNombreTranche($nombreTranche)
    {
        $this->nombreTranche = $nombreTranche;

        return $this;
    }

    /**
     * Get nombreTranche
     *
     * @return integer
     */
    public function getNombreTranche()
    {
        return $this->nombreTranche;
    }

    /**
     * Set nbEnfants
     *
     * @param integer $nbEnfants
     *
     * @return Souscription
     */
    public function setNbEnfants($nbEnfants)
    {
        $this->nbEnfants = $nbEnfants;

        return $this;
    }

    /**
     * Get nbEnfants
     *
     * @return integer
     */
    public function getNbEnfants()
    {
        return $this->nbEnfants;
    }

    /**
     * Set conjoint
     *
     * @param boolean $conjoint
     *
     * @return Souscription
     */
    public function setConjoint($conjoint)
    {
        $this->conjoint = $conjoint;

        return $this;
    }

    /**
     * Get conjoint
     *
     * @return boolean
     */
    public function getConjoint()
    {
        return $this->conjoint;
    }

    /**
     * Set dateSouscription
     *
     * @param \DateTime $dateSouscription
     *
     * @return Souscription
     */
    public function setDateSouscription($dateSouscription)
    {
        $this->dateSouscription = $dateSouscription;

        return $this;
    }

    /**
     * Get dateSouscription
     *
     * @return \DateTime
     */
    public function getDateSouscription()
    {
        return $this->dateSouscription;
    }

    /**
     * Set montant
     *
     * @param float $montant
     *
     * @return Souscription
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return float
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Souscription
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
}
