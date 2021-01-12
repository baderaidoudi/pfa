<?php
/**
 * Created by PhpStorm.
 * User: baidoudi
 * Date: 1/3/21
 * Time: 2:34 PM
 */

namespace Pfa\ProjectBundle\Repository;


use Doctrine\ORM\EntityRepository;


/**
 * @ORM\Entity(repositoryClass=Pfa\ProjectBundle\Entity\UserCredentials")
 */
class UserCredentialsRepository extends EntityRepository
{

    private function findallupdateSocieteDemande($userId, $pwd1)
    {
        $qb = $this->createQueryBuilder('d')
            ->update('Pfa\ProjectBundle\Entity\UserCredentials')
            ->set('u.password', '?0')
            ->setParameter(0, $userId)
            ->where('u.id = ?1')
            ->setParameter(1, $pwd1);

        return $qb
            ->getQuery()
            ->getSingleScalarResult();


    }






}