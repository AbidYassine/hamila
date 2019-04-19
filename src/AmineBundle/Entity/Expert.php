<?php

namespace AmineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Expert
 *
 * @ORM\Table(name="expert")
 * @ORM\Entity
 */
class Expert
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_expert", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idExpert;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_expert", type="string", length=255, nullable=false)
     */
    private $nomExpert;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_expert", type="string", length=255, nullable=false)
     */
    private $prenomExpert;

    /**
     * @var integer
     *
     * @ORM\Column(name="telephone_expert", type="integer", nullable=false)
     */
    private $telephoneExpert;

    /**
     * @var string
     *
     * @ORM\Column(name="email_expert", type="string", length=255, nullable=false)
     */
    private $emailExpert;

    /**
     * @var string
     *
     * @ORM\Column(name="disponibilite_expert", type="string", length=255, nullable=false)
     */
    private $disponibiliteExpert;



    /**
     * Get idExpert
     *
     * @return integer
     */
    public function getIdExpert()
    {
        return $this->idExpert;
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
     * Set telephoneExpert
     *
     * @param integer $telephoneExpert
     *
     * @return Expert
     */
    public function setTelephoneExpert($telephoneExpert)
    {
        $this->telephoneExpert = $telephoneExpert;

        return $this;
    }

    /**
     * Get telephoneExpert
     *
     * @return integer
     */
    public function getTelephoneExpert()
    {
        return $this->telephoneExpert;
    }

    /**
     * Set emailExpert
     *
     * @param string $emailExpert
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
     * @return string
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
}
