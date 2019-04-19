<?php

namespace AmineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Avis
 *
 * @ORM\Table(name="avis")
 * @ORM\Entity
 */
class Avis
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_avis", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAvis;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_client", type="integer", nullable=false)
     */
    private $idClient;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_offre", type="integer", nullable=false)
     */
    private $idOffre;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire_avis", type="text", length=65535, nullable=true)
     */
    private $commentaireAvis;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_avis", type="datetime", nullable=false)
     */
    private $dateAvis;

    /**
     * @var integer
     *
     * @ORM\Column(name="rating_avis", type="integer", nullable=true)
     */
    private $ratingAvis;



    /**
     * Get idAvis
     *
     * @return integer
     */
    public function getIdAvis()
    {
        return $this->idAvis;
    }

    /**
     * Set idClient
     *
     * @param integer $idClient
     *
     * @return Avis
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
     * Set idOffre
     *
     * @param integer $idOffre
     *
     * @return Avis
     */
    public function setIdOffre($idOffre)
    {
        $this->idOffre = $idOffre;

        return $this;
    }

    /**
     * Get idOffre
     *
     * @return integer
     */
    public function getIdOffre()
    {
        return $this->idOffre;
    }

    /**
     * Set commentaireAvis
     *
     * @param string $commentaireAvis
     *
     * @return Avis
     */
    public function setCommentaireAvis($commentaireAvis)
    {
        $this->commentaireAvis = $commentaireAvis;

        return $this;
    }

    /**
     * Get commentaireAvis
     *
     * @return string
     */
    public function getCommentaireAvis()
    {
        return $this->commentaireAvis;
    }

    /**
     * Set dateAvis
     *
     * @param \DateTime $dateAvis
     *
     * @return Avis
     */
    public function setDateAvis($dateAvis)
    {
        $this->dateAvis = $dateAvis;

        return $this;
    }

    /**
     * Get dateAvis
     *
     * @return \DateTime
     */
    public function getDateAvis()
    {
        return $this->dateAvis;
    }

    /**
     * Set ratingAvis
     *
     * @param integer $ratingAvis
     *
     * @return Avis
     */
    public function setRatingAvis($ratingAvis)
    {
        $this->ratingAvis = $ratingAvis;

        return $this;
    }

    /**
     * Get ratingAvis
     *
     * @return integer
     */
    public function getRatingAvis()
    {
        return $this->ratingAvis;
    }
}
