<?php

namespace AmineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Experience
 *
 * @ORM\Table(name="experience")
 * @ORM\Entity
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
     * @var integer
     *
     * @ORM\Column(name="id_client", type="integer", nullable=false)
     */
    private $idClient;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_experience", type="string", length=6000, nullable=false)
     */
    private $titreExperience;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire_experience", type="text", length=65535, nullable=false)
     */
    private $commentaireExperience;

    /**
     * @var string
     *
     * @ORM\Column(name="type_experience", type="string", length=6000, nullable=false)
     */
    private $typeExperience;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_experience", type="datetime", nullable=false)
     */
    private $dateExperience;



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
     * Set idClient
     *
     * @param integer $idClient
     *
     * @return Experience
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
     * Set commentaireExperience
     *
     * @param string $commentaireExperience
     *
     * @return Experience
     */
    public function setCommentaireExperience($commentaireExperience)
    {
        $this->commentaireExperience = $commentaireExperience;

        return $this;
    }

    /**
     * Get commentaireExperience
     *
     * @return string
     */
    public function getCommentaireExperience()
    {
        return $this->commentaireExperience;
    }

    /**
     * Set typeExperience
     *
     * @param string $typeExperience
     *
     * @return Experience
     */
    public function setTypeExperience($typeExperience)
    {
        $this->typeExperience = $typeExperience;

        return $this;
    }

    /**
     * Get typeExperience
     *
     * @return string
     */
    public function getTypeExperience()
    {
        return $this->typeExperience;
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
}
