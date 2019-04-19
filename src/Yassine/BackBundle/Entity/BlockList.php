<?php

namespace Yassine\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlockList
 *
 * @ORM\Table(name="block_list", indexes={@ORM\Index(name="id_client", columns={"id_client"})})
 * @ORM\Entity
 */
class BlockList
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_block", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBlock;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_client", type="integer", nullable=false)
     */
    private $idClient;

    /**
     * @var string
     *
     * @ORM\Column(name="Commentaire", type="string", length=6000, nullable=false)
     */
    private $commentaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Block", type="datetime", nullable=false)
     */
    private $dateBlock;



    /**
     * Get idBlock
     *
     * @return integer
     */
    public function getIdBlock()
    {
        return $this->idBlock;
    }

    /**
     * Set idClient
     *
     * @param integer $idClient
     *
     * @return BlockList
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
     * @return BlockList
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
     * Set dateBlock
     *
     * @param \DateTime $dateBlock
     *
     * @return BlockList
     */
    public function setDateBlock($dateBlock)
    {
        $this->dateBlock = $dateBlock;

        return $this;
    }

    /**
     * Get dateBlock
     *
     * @return \DateTime
     */
    public function getDateBlock()
    {
        return $this->dateBlock;
    }
}
