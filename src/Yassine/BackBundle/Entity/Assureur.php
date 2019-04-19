<?php

namespace Yassine\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Assureur
 *
 * @ORM\Table(name="assureur")
 * @ORM\Entity
 */
class Assureur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_assureur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAssureur;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_assurance", type="string", length=255, nullable=false)
     */
    private $nomAssurance;

    /**
     * @var string
     *
     * @ORM\Column(name="mail_assureur", type="string", length=255, nullable=false)
     */
    private $mailAssureur;



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
     * Set nomAssurance
     *
     * @param string $nomAssurance
     *
     * @return Assureur
     */
    public function setNomAssurance($nomAssurance)
    {
        $this->nomAssurance = $nomAssurance;

        return $this;
    }

    /**
     * Get nomAssurance
     *
     * @return string
     */
    public function getNomAssurance()
    {
        return $this->nomAssurance;
    }

    /**
     * Set mailAssureur
     *
     * @param string $mailAssureur
     *
     * @return Assureur
     */
    public function setMailAssureur($mailAssureur)
    {
        $this->mailAssureur = $mailAssureur;

        return $this;
    }

    /**
     * Get mailAssureur
     *
     * @return string
     */
    public function getMailAssureur()
    {
        return $this->mailAssureur;
    }
}
