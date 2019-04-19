<?php

namespace HayderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Demande
 *
 * @ORM\Table(name="demande")
 * @ORM\Entity(repositoryClass="HayderBundle\Repository\DemandeRepository")
 */
class Demande
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
     * @ORM\Column(name="type_demande", type="string", length=255)
     */
    private $typeDemande;

    /**
     * @var string
     *
     * @ORM\Column(name="motif", type="string", length=255)
     */
    private $motif;

    /**
     * @var string
     *
     * @ORM\Column(name="type_soin", type="string", length=255)
     */
    private $typeSoin;

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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;


    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Demande
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
}
