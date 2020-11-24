<?php

namespace Compte\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ActivationCodeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ActivationCodeRepository extends EntityRepository
{
    public function getCodeForVerification($email, $code) {
        $query = $this->createQueryBuilder('ac')
            ->innerJoin('ac.member', 'm', 'WITH', 'm.email = :email')
            ->where('ac.code = :code')
            ->andWhere('ac.used = :used')
            ->setParameters(
                array(
                    ':code' => $code,
                    ':email' => $email,
                    ':used' => false
                )
            )
            ->getQuery();

        return $query->getOneOrNullResult();
    }
}
