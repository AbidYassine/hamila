<?php

namespace FarahBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * HistoryDon
 *
 * @ORM\Table(name="history_don")
 * @ORM\Entity(repositoryClass="FarahBundle\Repository\HistoryDonRepository")
 */
class HistoryDon
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
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \FarahBundle\Entity\Don
     *
     * @ORM\ManyToOne(targetEntity="FarahBundle\Entity\Don")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_don", referencedColumnName="id")
     * })
     */
    private $don;

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
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return HistoryDon
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
     * Set don
     *
     * @param \FarahBundle\Entity\Don $don
     *
     * @return HistoryDon
     */
    public function setDon(\FarahBundle\Entity\Don $don = null)
    {
        $this->don = $don;

        return $this;
    }

    /**
     * Get don
     *
     * @return \FarahBundle\Entity\Don
     */
    public function getDon()
    {
        return $this->don;
    }
}
