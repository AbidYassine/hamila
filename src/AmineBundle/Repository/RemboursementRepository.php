<?php

namespace AmineBundle\Repository;
use Doctrine\ORM\EntityRepository;


/**
 * Created by PhpStorm.
 * User: bensa
 * Date: 10/04/2019
 * Time: 9:29 AM
 */




class RemboursementRepository extends EntityRepository
{
    public function findByIdRemboursement($id)
    {
        $query=$this->getEntityManager()
            ->createQuery("select r.id from Remboursement r WHERE r.idRemboursement=:id")
            ->setParameter('id',$id);

        return $query->getResult();

    }


}

