<?php

namespace AppBundle\Repository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{
    public function getUser($email, $password)
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder();
        $query->select('user')
            ->from('AppBundle:User', 'user')
            ->where('user.email = :email')
            ->andWhere('user.plainPassword = :password');
        $query->setParameter('email', $email);
        $query->setParameter('password', $password);
        $result = $query->getQuery()->getSingleResult();
        return $result;
    }
}