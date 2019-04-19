<?php

namespace Yassine\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offre
 *
 * @ORM\Table(name="offre")
 * @ORM\Entity
 */
class Offre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_offre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOffre;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_assureur", type="integer", nullable=false)
     */
    private $idAssureur;

    /**
     * @var string
     *
     * @ORM\Column(name="type_offre", type="string", length=255, nullable=false)
     */
    private $typeOffre;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_de_base_offre", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixDeBaseOffre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut_offre", type="date", nullable=false)
     */
    private $dateDebutOffre;

    /**
     * @var float
     *
     * @ORM\Column(name="pourcentage_visite_offre", type="float", precision=10, scale=0, nullable=false)
     */
    private $pourcentageVisiteOffre;

    /**
     * @var float
     *
     * @ORM\Column(name="pourcentage_medicament_offre", type="float", precision=10, scale=0, nullable=false)
     */
    private $pourcentageMedicamentOffre;

    /**
     * @var float
     *
     * @ORM\Column(name="pourcentage_operation_offre", type="float", precision=10, scale=0, nullable=false)
     */
    private $pourcentageOperationOffre;

    /**
     * @var float
     *
     * @ORM\Column(name="plafond_viste_offre", type="float", precision=10, scale=0, nullable=false)
     */
    private $plafondVisteOffre;

    /**
     * @var float
     *
     * @ORM\Column(name="plafond_mediacement_offre", type="float", precision=10, scale=0, nullable=false)
     */
    private $plafondMediacementOffre;

    /**
     * @var float
     *
     * @ORM\Column(name="plafond_operation_offre", type="float", precision=10, scale=0, nullable=false)
     */
    private $plafondOperationOffre;

    /**
     * @var float
     *
     * @ORM\Column(name="pr_conjoint", type="float", precision=10, scale=0, nullable=true)
     */
    private $prConjoint;

    /**
     * @var float
     *
     * @ORM\Column(name="pr_enfant", type="float", precision=10, scale=0, nullable=true)
     */
    private $prEnfant;



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
     * Set idAssureur
     *
     * @param integer $idAssureur
     *
     * @return Offre
     */
    public function setIdAssureur($idAssureur)
    {
        $this->idAssureur = $idAssureur;

        return $this;
    }

    /**
     * Get idAssureur
     *
     * @return integer
     */
    public function getIdAssureur()
    {
        return $this->idAssureur;
    }

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
     * Set plafondVisteOffre
     *
     * @param float $plafondVisteOffre
     *
     * @return Offre
     */
    public function setPlafondVisteOffre($plafondVisteOffre)
    {
        $this->plafondVisteOffre = $plafondVisteOffre;

        return $this;
    }

    /**
     * Get plafondVisteOffre
     *
     * @return float
     */
    public function getPlafondVisteOffre()
    {
        return $this->plafondVisteOffre;
    }

    /**
     * Set plafondMediacementOffre
     *
     * @param float $plafondMediacementOffre
     *
     * @return Offre
     */
    public function setPlafondMediacementOffre($plafondMediacementOffre)
    {
        $this->plafondMediacementOffre = $plafondMediacementOffre;

        return $this;
    }

    /**
     * Get plafondMediacementOffre
     *
     * @return float
     */
    public function getPlafondMediacementOffre()
    {
        return $this->plafondMediacementOffre;
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
     * @param float $prEnfant
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
     * @return float
     */
    public function getPrEnfant()
    {
        return $this->prEnfant;
    }
}
