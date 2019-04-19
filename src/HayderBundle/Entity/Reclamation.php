<?php

namespace HayderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation")
 * @ORM\Entity(repositoryClass="HayderBundle\Repository\ReclamationRepository")
 */
class Reclamation
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
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="type_reclamation", type="string", length=255)
     */
    private $typeReclamation;

    /**
     * @var string
     *
     * @ORM\Column(name="texte_libre", type="string", length=255)
     */
    private $texteLibre;

    /**
     * @var string
     *
     * @ORM\Column(name="piece_jointe", type="string", length=255)
     */
    private $pieceJointe;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse", type="string", length=255, nullable=true)
     */
    private $reponse;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;


    /**
     * @var string
     *
     * @ORM\Column(name="date", type="date", length=255, nullable=true)
     */
    private $date;


    public function __construct()
    {
        $this->date = new \DateTime();
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }




    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Reclamation
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }


    /**
     * @Assert\File (maxSize="10240k")
     */
    private $file;

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    public function getWebPath(){
        return null===$this->pieceJointe ? null : $this->getUploadDir().'/'.$this->pieceJointe;
    }
    public function getUploadRootDir(){
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }
    public function getUploadDir() {
        return 'img' ;
    }
    public function uploadPicture() {
        $this->file->move($this->getUploadRootDir() , $this->file->getClientOriginalName());
        $this->pieceJointe = $this->file->getClientOriginalName();
        dump($this->file->getClientOriginalName());
        $this->file=null;
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


}
