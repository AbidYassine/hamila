<?php

namespace Yassine\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Experience
 * @ORM\Entity(repositoryClass="Yassine\BackBundle\Repository\ExperienceRepository")
 * @ORM\Table(name="experience", indexes={@ORM\Index(name="id_client", columns={"id_client"})})
 *
 */
class Experience
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_experience", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idExperience;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_experience", type="string", length=6000, nullable=false)
     */
    private $titreExperience;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_experience", type="date", nullable=false)
     */
    private $dateExperience;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_rep", type="integer", nullable=false)
     */
    private $nbRep = '0';


    /**
     * @var \integer
     *
     * @ORM\Column(name="id_client", type="integer", nullable=false)
     */
    private $idClient;

    /**
     * @var integer
     *
     * @ORM\Column(name="valider", type="integer", nullable=false)
     */
    private $valider ;

    /**
     * @return int
     */
    public function getValider()
    {
        return $this->valider;
    }

    /**
     * @param int $valider
     */
    public function setValider($valider)
    {
        $this->valider = $valider;
    }


    /**
     * Get idExperience
     *
     * @return integer
     */
    public function getIdExperience()
    {
        return $this->idExperience;
    }

    /**
     * Set titreExperience
     *
     * @param string $titreExperience
     *
     * @return Experience
     */
    public function setTitreExperience($titreExperience)
    {
        $this->titreExperience = $titreExperience;

        return $this;
    }

    /**
     * Get titreExperience
     *
     * @return string
     */
    public function getTitreExperience()
    {
        return $this->titreExperience;
    }

    /**
     * Set dateExperience
     *
     * @param \DateTime $dateExperience
     *
     * @return Experience
     */
    public function setDateExperience($dateExperience)
    {
        $this->dateExperience = $dateExperience;

        return $this;
    }

    /**
     * Get dateExperience
     *
     * @return \DateTime
     */
    public function getDateExperience()
    {
        return $this->dateExperience;
    }

    /**
     * Set nbRep
     *
     * @param integer $nbRep
     *
     * @return Experience
     */
    public function setNbRep($nbRep)
    {
        $this->nbRep = $nbRep;

        return $this;
    }

    /**
     * Get nbRep
     *
     * @return integer
     */
    public function getNbRep()
    {
        return $this->nbRep;
    }

    /**
     * Set idClient
     *
     * @param integer $idClient
     *
     * @return experience
     */
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;

        return $this;
    }

    /**
     * Get idClient
     *
     * @return int
     */
    public function getIdClient()
    {
        return $this->idClient;
    }













}
