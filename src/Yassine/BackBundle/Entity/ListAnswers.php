<?php

namespace Yassine\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListAnswers
 *
 * @ORM\Table(name="list_answers", indexes={@ORM\Index(name="id_client", columns={"id_client"}), @ORM\Index(name="id_experience", columns={"id_experience"})})
 * @ORM\Entity(repositoryClass="Yassine\BackBundle\Repository\ListAnswersRepository")
 */
class ListAnswers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_answer", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTopic;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_experience", type="integer", nullable=false)
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
     * @ORM\Column(name="Commentaire", type="string", length=65000, nullable=false)
     */
    private $commentaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_reponse", type="date", nullable=false)
     */
    private $dateReponse;



    /**
     * Get idTopic
     *
     * @return integer
     */
    public function getIdTopic()
    {
        return $this->idTopic;
    }

    /**
     * Set idExperience
     *
     * @param integer $idExperience
     *
     * @return ListAnswers
     */
    public function setIdExperience($idExperience)
    {
        $this->idExperience = $idExperience;

        return $this;
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
     * Set idClient
     *
     * @param integer $idClient
     *
     * @return ListAnswers
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
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return ListAnswers
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set dateReponse
     *
     * @param \DateTime $dateReponse
     *
     * @return ListAnswers
     */
    public function setDateReponse($dateReponse)
    {
        $this->dateReponse = $dateReponse;

        return $this;
    }

    /**
     * Get dateReponse
     *
     * @return \DateTime
     */
    public function getDateReponse()
    {
        return $this->dateReponse;
    }
}
