<?php

namespace Yassine\BackBundle\Entity;

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
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255, nullable=true)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="type_demande", type="string", length=255, nullable=true)
     */
    private $typeDemande;

    /**
     * @var string
     *
     * @ORM\Column(name="motif", type="string", length=255, nullable=true)
     */
    private $motif;

    /**
     * @var string
     *
     * @ORM\Column(name="type_soin", type="string", length=255, nullable=true)
     */
    private $typeSoin;

    /**
     * @var string
     *
     * @ORM\Column(name="texte_libre", type="string", length=255, nullable=true)
     */
    private $texteLibre;

    /**
     * @var string
     *
     * @ORM\Column(name="piece_jointe", type="blob", nullable=true)
     */
    private $pieceJointe;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse", type="string", length=255, nullable=true)
     */
    private $reponse;

    /**
     * @var integer
     *
     * @ORM\Column(name="gestionnaire", type="integer", nullable=true)
     */
    private $gestionnaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="extension", type="string", length=255, nullable=false)
     */
    private $extension;



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
     * Set etat
     *
     * @param string $etat
     *
     * @return Demande
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
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
     * Set motif
     *
     * @param string $motif
     *
     * @return Demande
     */
    public function setMotif($motif)
    {
        $this->motif = $motif;

        return $this;
    }

    /**
     * Get motif
     *
     * @return string
     */
    public function getMotif()
    {
        return $this->motif;
    }

    /**
     * Set typeSoin
     *
     * @param string $typeSoin
     *
     * @return Demande
     */
    public function setTypeSoin($typeSoin)
    {
        $this->typeSoin = $typeSoin;

        return $this;
    }

    /**
     * Get typeSoin
     *
     * @return string
     */
    public function getTypeSoin()
    {
        return $this->typeSoin;
    }

    /**
     * Set texteLibre
     *
     * @param string $texteLibre
     *
     * @return Demande
     */
    public function setTexteLibre($texteLibre)
    {
        $this->texteLibre = $texteLibre;

        return $this;
    }

    /**
     * Get texteLibre
     *
     * @return string
     */
    public function getTexteLibre()
    {
        return $this->texteLibre;
    }

    /**
     * Set pieceJointe
     *
     * @param string $pieceJointe
     *
     * @return Demande
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
     * Set reponse
     *
     * @param string $reponse
     *
     * @return Demande
     */
    public function setReponse($reponse)
    {
        $this->reponse = $reponse;

        return $this;
    }

    /**
     * Get reponse
     *
     * @return string
     */
    public function getReponse()
    {
        return $this->reponse;
    }

    /**
     * Set gestionnaire
     *
     * @param integer $gestionnaire
     *
     * @return Demande
     */
    public function setGestionnaire($gestionnaire)
    {
        $this->gestionnaire = $gestionnaire;

        return $this;
    }

    /**
     * Get gestionnaire
     *
     * @return integer
     */
    public function getGestionnaire()
    {
        return $this->gestionnaire;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Demande
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set extension
     *
     * @param string $extension
     *
     * @return Demande
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
}
