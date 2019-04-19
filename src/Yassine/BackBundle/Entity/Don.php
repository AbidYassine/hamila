<?php

namespace Yassine\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Don
 *
 * @ORM\Table(name="don", indexes={@ORM\Index(name="fk_don", columns={"id_client"}), @ORM\Index(name="fk_don_p", columns={"id_p"})})
 * @ORM\Entity
 */
class Don
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_don", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDon;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_client", type="integer", nullable=false)
     */
    private $idClient;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_p", type="integer", nullable=false)
     */
    private $idP;

    /**
     * @var float
     *
     * @ORM\Column(name="somme", type="float", precision=10, scale=0, nullable=false)
     */
    private $somme;



    /**
     * Get idDon
     *
     * @return integer
     */
    public function getIdDon()
    {
        return $this->idDon;
    }

    /**
     * Set idClient
     *
     * @param integer $idClient
     *
     * @return Don
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
     * Set idP
     *
     * @param integer $idP
     *
     * @return Don
     */
    public function setIdP($idP)
    {
        $this->idP = $idP;

        return $this;
    }

    /**
     * Get idP
     *
     * @return integer
     */
    public function getIdP()
    {
        return $this->idP;
    }

    /**
     * Set somme
     *
     * @param float $somme
     *
     * @return Don
     */
    public function setSomme($somme)
    {
        $this->somme = $somme;

        return $this;
    }

    /**
     * Get somme
     *
     * @return float
     */
    public function getSomme()
    {
        return $this->somme;
    }
}
