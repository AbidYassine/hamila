<?php

namespace AmineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cotisation
 *
 * @ORM\Table(name="cotisation", indexes={@ORM\Index(name="FK_id_client", columns={"id_client"}), @ORM\Index(name="FK_id_souscription", columns={"id_souscription"})})
 * @ORM\Entity
 */
/**
 * @ORM\Entity(repositoryClass="AmineBundle\Repository\CotisationRepository")
 */
class Cotisation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_cotisation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCotisation;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_assureur", type="integer", nullable=false)
     */
    private $idAssureur;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_souscription", type="integer", nullable=false)
     */
    private $idSouscription;

    /**
     * @var float
     *
     * @ORM\Column(name="Prix_HT", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixHt;

    /**
     * @var float
     *
     * @ORM\Column(name="Prix_TTC", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixTtc;

    /**
     * @var integer
     *
     * @ORM\Column(name="TVA", type="integer", nullable=false)
     */
    private $tva;

    /**
     * @var string
     *
     * @ORM\Column(name="date_debut_cotisation", type="string", length=255, nullable=false)
     */
    private $dateDebutCotisation;

    /**
     * @var string
     *
     * @ORM\Column(name="date_fin_cotisation", type="string", length=255, nullable=false)
     */
    private $dateFinCotisation;

    /**
     * @var string
     *
     * @ORM\Column(name="paiement", type="string", length=255, nullable=true)
     */
    private $paiement;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_Client", type="integer", nullable=false)
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     */
    private $idClient;



    /**
     * Get idCotisation
     *
     * @return integer
     */
    public function getIdCotisation()
    {
        return $this->idCotisation;
    }

    /**
     * Set idAssureur
     *
     * @param integer $idAssureur
     *
     * @return Cotisation
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
     * Set idSouscription
     *
     * @param integer $idSouscription
     *
     * @return Cotisation
     */
    public function setIdSouscription($idSouscription)
    {
        $this->idSouscription = $idSouscription;

        return $this;
    }

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
     * Set prixHt
     *
     * @param float $prixHt
     *
     * @return Cotisation
     */
    public function setPrixHt($prixHt)
    {
        $this->prixHt = $prixHt;

        return $this;
    }

    /**
     * Get prixHt
     *
     * @return float
     */
    public function getPrixHt()
    {
        return $this->prixHt;
    }

    /**
     * Set prixTtc
     *
     * @param float $prixTtc
     *
     * @return Cotisation
     */
    public function setPrixTtc($prixTtc)
    {
        $this->prixTtc = $prixTtc;

        return $this;
    }

    /**
     * Get prixTtc
     *
     * @return float
     */
    public function getPrixTtc()
    {
        return $this->prixTtc;
    }

    /**
     * Set tva
     *
     * @param integer $tva
     *
     * @return Cotisation
     */
    public function setTva($tva)
    {
        $this->tva = $tva;

        return $this;
    }

    /**
     * Get tva
     *
     * @return integer
     */
    public function getTva()
    {
        return $this->tva;
    }

    /**
     * Set dateDebutCotisation
     *
     * @param string $dateDebutCotisation
     *
     * @return Cotisation
     */
    public function setDateDebutCotisation($dateDebutCotisation)
    {
        $this->dateDebutCotisation = $dateDebutCotisation;

        return $this;
    }

    /**
     * Get dateDebutCotisation
     *
     * @return string
     */
    public function getDateDebutCotisation()
    {
        return $this->dateDebutCotisation;
    }

    /**
     * Set dateFinCotisation
     *
     * @param string $dateFinCotisation
     *
     * @return Cotisation
     */
    public function setDateFinCotisation($dateFinCotisation)
    {
        $this->dateFinCotisation = $dateFinCotisation;

        return $this;
    }

    /**
     * Get dateFinCotisation
     *
     * @return string
     */
    public function getDateFinCotisation()
    {
        return $this->dateFinCotisation;
    }

    /**
     * Set paiement
     *
     * @param string $paiement
     *
     * @return Cotisation
     */
    public function setPaiement($paiement)
    {
        $this->paiement = $paiement;

        return $this;
    }

    /**
     * Get paiement
     *
     * @return string
     */
    public function getPaiement()
    {
        return $this->paiement;
    }

    /**
     * Set idClient
     *
     * @param integer $idClient
     *
     * @return Cotisation
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
}
