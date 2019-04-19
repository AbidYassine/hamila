<?php
/**
 * Created by PhpStorm.
 * User: bensa
 * Date: 10/04/2019
 * Time: 2:53 PM
 */

namespace AmineBundle\Repository;

use Doctrine\ORM\EntityRepository;

class SouscriptionRepository extends EntityRepository
{
    public function findByIdClient($id)
    {
        $query=$this->getEntityManager()
            ->createQuery("select s.idOffre from souscription s where idClient=:id")
            ->setParameter('id',$id);

        return $query->getResult();

    }
}