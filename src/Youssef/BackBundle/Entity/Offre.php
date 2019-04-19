<?php

namespace Youssef\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offre
 *
 * @ORM\Table(name="offre")
 * @ORM\Entity(repositoryClass="Youssef\BackBundle\Repository\OffreRepository")
 */
class Offre
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_offre", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    public function __construct()
    {
        $this->dateDebutOffre = new \Datetime();
    }
    /**
     * @ORM\ManyToOne(targetEntity="Youssef\BackBundle\Entity\Assureur")
     */
    private $Assureur;

    /**
     * @var string
     *
     * @ORM\Column(name="type_offre", type="string", length=25)
     */
    private $typeOffre;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_de_base_offre", type="float")
     */
    private $prixDeBaseOffre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut_offre", type="date")
     */
    private $dateDebutOffre;

    /**
     * @var float
     *
     * @ORM\Column(name="pourcentage_visite_offre", type="float")
     */
    private $pourcentageVisiteOffre;

    /**
     * @var float
     *
     * @ORM\Column(name="pourcentage_medicament_offre", type="float")
     */
    private $pourcentageMedicamentOffre;

    /**
     * @var float
     *
     * @ORM\Column(name="pourcentage_operation_offre", type="float")
     */
    private $pourcentageOperationOffre;

    /**
     * @var float
     *
     * @ORM\Column(name="plafond_viste_offre", type="float")
     */
    private $plafondVisiteOffre;

    /**
     * @var float
     *
     * @ORM\Column(name="plafond_mediacement_offre", type="float")
     */
    private $plafondMedicamentOffre;

    /**
     * @var float
     *
     * @ORM\Column(name="plafond_operation_offre", type="float")
     */
    private $plafondOperationOffre;

    /**
     * @var float
     *
     * @ORM\Column(name="pr_conjoint", type="float")
     */
    private $prConjoint;

    /**
     * @var float
     *
     * @ORM\Column(name="pr_enfant", type="float")
     */
    private $prEnfant;

    /**
     * Set typeOffre
     *
     * @param string $typeOffre
     *
     * @return Offre
     */
    public function setTypeOffre($typeOffre)
    {
        $this->typeOffre = $typeOffre;

        return $this;
    }

    /**
     * Get typeOffre
     *
     * @return string
     */
    public function getTypeOffre()
    {
        return $this->typeOffre;
    }

    /**
     * Set prixDeBaseOffre
     *
     * @param float $prixDeBaseOffre
     *
     * @return Offre
     */
    public function setPrixDeBaseOffre($prixDeBaseOffre)
    {
        $this->prixDeBaseOffre = $prixDeBaseOffre;

        return $this;
    }

    /**
     * Get prixDeBaseOffre
     *
     * @return float
     */
    public function getPrixDeBaseOffre()
    {
        return $this->prixDeBaseOffre;
    }

    /**
     * Set dateDebutOffre
     *
     * @param \DateTime $dateDebutOffre
     *
     * @return Offre
     */
    public function setDateDebutOffre($dateDebutOffre)
    {
        $this->dateDebutOffre = $dateDebutOffre;

        return $this;
    }

    /**
     * Get dateDebutOffre
     *
     * @return \DateTime
     */
    public function getDateDebutOffre()
    {
        return $this->dateDebutOffre;
    }

    /**
     * Set pourcentageVisiteOffre
     *
     * @param float $pourcentageVisiteOffre
     *
     * @return Offre
     */
    public function setPourcentageVisiteOffre($pourcentageVisiteOffre)
    {
        $this->pourcentageVisiteOffre = $pourcentageVisiteOffre;

        return $this;
    }

    /**
     * Get pourcentageVisiteOffre
     *
     * @return float
     */
    public function getPourcentageVisiteOffre()
    {
        return $this->pourcentageVisiteOffre;
    }

    /**
     * Set pourcentageMedicamentOffre
     *
     * @param float $pourcentageMedicamentOffre
     *
     * @return Offre
     */
    public function setPourcentageMedicamentOffre($pourcentageMedicamentOffre)
    {
        $this->pourcentageMedicamentOffre = $pourcentageMedicamentOffre;

        return $this;
    }

    /**
     * Get pourcentageMedicamentOffre
     *
     * @return float
     */
    public function getPourcentageMedicamentOffre()
    {
        return $this->pourcentageMedicamentOffre;
    }

    /**
     * Set pourcentageOperationOffre
     *
     * @param float $pourcentageOperationOffre
     *
     * @return Offre
     */
    public function setPourcentageOperationOffre($pourcentageOperationOffre)
    {
        $this->pourcentageOperationOffre = $pourcentageOperationOffre;

        return $this;
    }

    /**
     * Get pourcentageOperationOffre
     *
     * @return float
     */
    public function getPourcentageOperationOffre()
    {
        return $this->pourcentageOperationOffre;
    }

    /**
     * Set plafondVisiteOffre
     *
     * @param float $plafondVisiteOffre
     *
     * @return Offre
     */
    public function setPlafondVisiteOffre($plafondVisiteOffre)
    {
        $this->plafondVisiteOffre = $plafondVisiteOffre;

        return $this;
    }

    /**
     * Get plafondVisiteOffre
     *
     * @return float
     */
    public function getPlafondVisiteOffre()
    {
        return $this->plafondVisiteOffre;
    }

    /**
     * Set plafondMedicamentOffre
     *
     * @param float $plafondMedicamentOffre
     *
     * @return Offre
     */
    public function setPlafondMedicamentOffre($plafondMedicamentOffre)
    {
        $this->plafondMedicamentOffre = $plafondMedicamentOffre;

        return $this;
    }

    /**
     * Get plafondMedicamentOffre
     *
     * @return float
     */
    public function getPlafondMedicamentOffre()
    {
        return $this->plafondMedicamentOffre;
    }

    /**
     * Set plafondOperationOffre
     *
     * @param float $plafondOperationOffre
     *
     * @return Offre
     */
    public function setPlafondOperationOffre($plafondOperationOffre)
    {
        $this->plafondOperationOffre = $plafondOperationOffre;

        return $this;
    }

    /**
     * Get plafondOperationOffre
     *
     * @return float
     */
    public function getPlafondOperationOffre()
    {
        return $this->plafondOperationOffre;
    }

    /**
     * Set prConjoint
     *
     * @param float $prConjoint
     *
     * @return Offre
     */
    public function setPrConjoint($prConjoint)
    {
        $this->prConjoint = $prConjoint;

        return $this;
    }

    /**
     * Get prConjoint
     *
     * @return float
     */
    public function getPrConjoint()
    {
        return $this->prConjoint;
    }

    /**
     * Set prEnfant
     *
     * @param string $prEnfant
     *
     * @return Offre
     */
    public function setPrEnfant($prEnfant)
    {
        $this->prEnfant = $prEnfant;

        return $this;
    }

    /**
     * Get prEnfant
     *
     * @return string
     */
    public function getPrEnfant()
    {
        return $this->prEnfant;
    }
    /**
     * Set Assureur
     *
     * @param \Youssef\BackBundle\Entity\Assureur $Assureur
     *
     * @return Assureur
     */
    public function setAssureur(\Youssef\BackBundle\Entity\Assureur $Assureur= null)
    {
        $this->Assureur = $Assureur;

        return $this;
    }

    /**
     * Get Assureur
     *
     * @return \Youssef\BackBundle\Entity\Assureur
     */
    public function getAssureur()
    {
        return $this->Assureur;
    }



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
