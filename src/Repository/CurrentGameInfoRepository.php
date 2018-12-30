<?php

namespace App\Repository;

use App\Entity\CurrentGameInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CurrentGameInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method CurrentGameInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method CurrentGameInfo[]    findAll()
 * @method CurrentGameInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CurrentGameInfoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CurrentGameInfo::class);
    }

    // /**
    //  * @return CurrentGameInfo[] Returns an array of CurrentGameInfo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CurrentGameInfo
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
