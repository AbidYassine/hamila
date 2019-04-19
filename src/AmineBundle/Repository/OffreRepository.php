<?php
/**
 * Created by PhpStorm.
 * User: bensa
 * Date: 10/04/2019
 * Time: 3:26 PM
 */

namespace AmineBundle\Repository;
use Doctrine\ORM\EntityRepository;

class OffreRepository extends EntityRepository
{
    public function findByIdOffre($id)
    {
        $query=$this->getEntityManager()
            ->createQuery("select o.idAssureur from AmineBundle:Offre o WHERE o.idOffre=:id")
            ->setParameter('id',$id);

        return $query->getResult();

    }
}