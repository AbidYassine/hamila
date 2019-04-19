<?php

namespace Yassine\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation")
 * @ORM\Entity
 */
class Reclamation
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
     * @ORM\Column(name="type_reclamation", type="string", length=255, nullable=true)
     */
    private $typeReclamation;

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
     * @ORM\Column(name="extension", type="string", length=30, nullable=false)
     */
    private $extension;

    /**
     * @var integer
     *
     * @ORM\Column(name="gestionnaire", type="integer", nullable=true)
     */
    private $gestionnaire;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse", type="string", length=255, nullable=true)
     */
    private $reponse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;



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
     * @return Reclamation
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
     * Set typeReclamation
     *
     * @param string $typeReclamation
     *
     * @return Reclamation
     */
    public function setTypeReclamation($typeReclamation)
    {
        $this->typeReclamation = $typeReclamation;

        return $this;
    }

    /**
     * Get typeReclamation
     *
     * @return string
     */
    public function getTypeReclamation()
    {
        return $this->typeReclamation;
    }

    /**
     * Set texteLibre
     *
     * @param string $texteLibre
     *
     * @return Reclamation
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
     * @return Reclamation
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
     * @return Reclamation
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
     * Set gestionnaire
     *
     * @param integer $gestionnaire
     *
     * @return Reclamation
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
     * Set reponse
     *
     * @param string $reponse
     *
     * @return Reclamation
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Reclamation
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
}
