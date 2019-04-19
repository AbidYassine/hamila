<?php

namespace Yassine\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Remboursement
 *
 * @ORM\Table(name="remboursement", indexes={@ORM\Index(name="FK_id_client", columns={"id_client"})})
 * @ORM\Entity
 */
class Remboursement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_remboursement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRemboursement;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_client", type="integer", nullable=false)
     */
    private $idClient;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_souscription", type="integer", nullable=false)
     */
    private $idSouscription;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_assureur", type="integer", nullable=false)
     */
    private $idAssureur;

    /**
     * @var float
     *
     * @ORM\Column(name="montant_operation", type="float", precision=10, scale=0, nullable=false)
     */
    private $montantOperation;

    /**
     * @var float
     *
     * @ORM\Column(name="montant_rembourcement", type="float", precision=10, scale=0, nullable=false)
     */
    private $montantRembourcement;

    /**
     * @var string
     *
     * @ORM\Column(name="piece_jointe", type="blob", nullable=true)
     */
    private $pieceJointe;

    /**
     * @var string
     *
     * @ORM\Column(name="extension", type="string", length=30, nullable=true)
     */
    private $extension;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire_rembourcement", type="text", length=65535, nullable=true)
     */
    private $commentaireRembourcement;

    /**
     * @var string
     *
     * @ORM\Column(name="type_rembourcement", type="string", length=255, nullable=false)
     */
    private $typeRembourcement;

    /**
     * @var string
     *
     * @ORM\Column(name="validation", type="string", length=255, nullable=true)
     */
    private $validation;

    /**
     * @var string
     *
     * @ORM\Column(name="date_rembourcement", type="string", length=255, nullable=false)
     */
    private $dateRembourcement;



    /**
     * Get idRemboursement
     *
     * @return integer
     */
    public function getIdRemboursement()
    {
        return $this->idRemboursement;
    }

    /**
     * Set idClient
     *
     * @param integer $idClient
     *
     * @return Remboursement
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
     * Set idSouscription
     *
     * @param integer $idSouscription
     *
     * @return Remboursement
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
     * Set idAssureur
     *
     * @param integer $idAssureur
     *
     * @return Remboursement
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
     * Set montantOperation
     *
     * @param float $montantOperation
     *
     * @return Remboursement
     */
    public function setMontantOperation($montantOperation)
    {
        $this->montantOperation = $montantOperation;

        return $this;
    }

    /**
     * Get montantOperation
     *
     * @return float
     */
    public function getMontantOperation()
    {
        return $this->montantOperation;
    }

    /**
     * Set montantRembourcement
     *
     * @param float $montantRembourcement
     *
     * @return Remboursement
     */
    public function setMontantRembourcement($montantRembourcement)
    {
        $this->montantRembourcement = $montantRembourcement;

        return $this;
    }

    /**
     * Get montantRembourcement
     *
     * @return float
     */
    public function getMontantRembourcement()
    {
        return $this->montantRembourcement;
    }

    /**
     * Set pieceJointe
     *
     * @param string $pieceJointe
     *
     * @return Remboursement
     */
    public function setPieceJointe($pieceJointe)
    {
        $this->pieceJointe = $pieceJointe;

        return $this;
    }

    /**
     * Get pieceJointe
     *
     * @return string
     */
    public function getPieceJointe()
    {
        return $this->pieceJointe;
    }

    /**
     * Set extension
     *
     * @param string $extension
     *
     * @return Remboursement
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set commentaireRembourcement
     *
     * @param string $commentaireRembourcement
     *
     * @return Remboursement
     */
    public function setCommentaireRembourcement($commentaireRembourcement)
    {
        $this->commentaireRembourcement = $commentaireRembourcement;

        return $this;
    }

    /**
     * Get commentaireRembourcement
     *
     * @return string
     */
    public function getCommentaireRembourcement()
    {
        return $this->commentaireRembourcement;
    }

    /**
     * Set typeRembourcement
     *
     * @param string $typeRembourcement
     *
     * @return Remboursement
     */
    public function setTypeRembourcement($typeRembourcement)
    {
        $this->typeRembourcement = $typeRembourcement;

        return $this;
    }

    /**
     * Get typeRembourcement
     *
     * @return string
     */
    public function getTypeRembourcement()
    {
        return $this->typeRembourcement;
    }

    /**
     * Set validation
     *
     * @param string $validation
     *
     * @return Remboursement
     */
    public function setValidation($validation)
    {
        $this->validation = $validation;

        return $this;
    }

    /**
     * Get validation
     *
     * @return string
     */
    public function getValidation()
    {
        return $this->validation;
    }

    /**
     * Set dateRembourcement
     *
     * @param string $dateRembourcement
     *
     * @return Remboursement
     */
    public function setDateRembourcement($dateRembourcement)
    {
        $this->dateRembourcement = $dateRembourcement;

        return $this;
    }

    /**
     * Get dateRembourcement
     *
     * @return string
     */
    public function getDateRembourcement()
    {
        return $this->dateRembourcement;
    }
}
