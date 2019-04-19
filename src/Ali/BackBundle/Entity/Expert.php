<?php

namespace Ali\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Expert
 *
 * @ORM\Table(name="expert")
 * @ORM\Entity(repositoryClass="Ali\BackBundle\Repository\ExpertRepository")
 */
class Expert
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_expert", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")

     */
    private $id;
    /**
     * @var int
     *
     * @ORM\Column(name="id_as_user", type="integer")
     */
    private $idAsUser;
    public function __construct()
    {
        $this->note=0;
        $this->compteur=0;
        $this->type="exp";
        $this->disponibiliteExpert=1;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="nom_expert", type="string", length=255)
     */
    private $nomExpert;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_expert", type="string", length=255)
     */
    private $prenomExpert;
    /**
     * @var int
     *
     * @ORM\Column(name="note", type="integer")
     */
    private $note;
    /**
     * @var int
     *
     * @ORM\Column(name="compteur", type="integer")
     */
    private $compteur;
    /**
     * @var string
     *
     * @ORM\Column(name="email_expert", type="string", length=255)
     */
    private $emailExpert;

    /**
     * @var string
     *
     * @ORM\Column(name="disponibilite_expert", type="string", length=255)
     */
    private $disponibiliteExpert;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;
    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Expert
     */
    public function setId($id)
    {
        $this->note = $id;

        return $this;
    }

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
     * Set nomExpert
     *
     * @param string $nomExpert
     *
     * @return Expert
     */
    public function setNomExpert($nomExpert)
    {
        $this->nomExpert = $nomExpert;

        return $this;
    }

    /**
     * Get nomExpert
     *
     * @return string
     */
    public function getNomExpert()
    {
        return $this->nomExpert;
    }

    /**
     * Set prenomExpert
     *
     * @param string $prenomExpert
     *
     * @return Expert
     */
    public function setPrenomExpert($prenomExpert)
    {
        $this->prenomExpert = $prenomExpert;

        return $this;
    }

    /**
     * Get prenomExpert
     *
     * @return string
     */
    public function getPrenomExpert()
    {
        return $this->prenomExpert;
    }


    /**
     * Set emailExpert
     *
     * @param integer $emailExpert
     *
     * @return Expert
     */
    public function setEmailExpert($emailExpert)
    {
        $this->emailExpert = $emailExpert;

        return $this;
    }

    /**
     * Get emailExpert
     *
     * @return integer
     */
    public function getEmailExpert()
    {
        return $this->emailExpert;
    }

    /**
     * Set disponibiliteExpert
     *
     * @param string $disponibiliteExpert
     *
     * @return Expert
     */
    public function setDisponibiliteExpert($disponibiliteExpert)
    {
        $this->disponibiliteExpert = $disponibiliteExpert;

        return $this;
    }

    /**
     * Get disponibiliteExpert
     *
     * @return string
     */
    public function getDisponibiliteExpert()
    {
        return $this->disponibiliteExpert;
    }


    /**
     * Set type
     *
     * @param string $type
     *
     * @return Expert
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set note
     *
     * @param integer $note
     *
     * @return Expert
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return integer
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set compteur
     *
     * @param integer $compteur
     *
     * @return Expert
     */
    public function setCompteur($compteur)
    {
        $this->compteur = $compteur;

        return $this;
    }

    /**
     * Get compteur
     *
     * @return integer
     */
    public function getCompteur()
    {
        return $this->compteur;
    }

    /**
     * Set idAsUser
     *
     * @param integer $idAsUser
     *
     * @return Expert
     */
    public function setIdAsUser($idAsUser)
    {
        $this->idAsUser = $idAsUser;

        return $this;
    }

    /**
     * Get idAsUser
     *
     * @return integer
     */
    public function getIdAsUser()
    {
        return $this->idAsUser;
    }
}
