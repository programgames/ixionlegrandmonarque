<?php

namespace App\Repository;

use App\Entity\BannedChampion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BannedChampion|null find($id, $lockMode = null, $lockVersion = null)
 * @method BannedChampion|null findOneBy(array $criteria, array $orderBy = null)
 * @method BannedChampion[]    findAll()
 * @method BannedChampion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BannedChampionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BannedChampion::class);
    }

    // /**
    //  * @return BannedChampion[] Returns an array of BannedChampion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BannedChampion
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
