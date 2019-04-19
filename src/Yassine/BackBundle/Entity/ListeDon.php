<?php

namespace Yassine\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListeDon
 *
 * @ORM\Table(name="liste_don")
 * @ORM\Entity
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
     * Get idP
     *
     * @return integer
     */
    public function getIdP()
    {
        return $this->idP;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return ListeDon
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return ListeDon
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return ListeDon
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set somme
     *
     * @param float $somme
     *
     * @return ListeDon
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

    /**
     * Set sommeRestante
     *
     * @param float $sommeRestante
     *
     * @return ListeDon
     */
    public function setSommeRestante($sommeRestante)
    {
        $this->sommeRestante = $sommeRestante;

        return $this;
    }

    /**
     * Get sommeRestante
     *
     * @return float
     */
    public function getSommeRestante()
    {
        return $this->sommeRestante;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return ListeDon
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }
}
