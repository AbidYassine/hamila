<?php

namespace FarahBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListeDon
 *
 * @ORM\Table(name="liste_don")
 * @ORM\Entity(repositoryClass="FarahBundle\Repository\ListeDonRepository")
 */
class ListeDon
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_p", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idP;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="somme", type="float", precision=10, scale=0, nullable=false)
     */
    private $somme;

    /**
     * @var float
     *
     * @ORM\Column(name="somme_restante", type="float", precision=10, scale=0, nullable=false)
     */
    private $sommeRestante;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="blob", nullable=true)
     */
    private $photo;

    /**
     * @return int
     */
    public function getIdP()
    {
        return $this->idP;
    }

    /**
     * @param int $idP
     */
    public function setIdP($idP)
    {
        $this->idP = $idP;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getSomme()
    {
        return $this->somme;
    }

    /**
     * @param float $somme
     */
    public function setSomme($somme)
    {
        $this->somme = $somme;
    }

    /**
     * @return float
     */
    public function getSommeRestante()
    {
        return $this->sommeRestante;
    }

    /**
     * @param float $sommeRestante
     */
    public function setSommeRestante($sommeRestante)
    {
        $this->sommeRestante = $sommeRestante;
    }

    /**
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param string $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }


}

