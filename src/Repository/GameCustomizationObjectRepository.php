<?php

namespace App\Repository;

use App\Entity\GameCustomizationObject;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GameCustomizationObject|null find($id, $lockMode = null, $lockVersion = null)
 * @method GameCustomizationObject|null findOneBy(array $criteria, array $orderBy = null)
 * @method GameCustomizationObject[]    findAll()
 * @method GameCustomizationObject[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GameCustomizationObjectRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GameCustomizationObject::class);
    }

    // /**
    //  * @return GameCustomizationObject[] Returns an array of GameCustomizationObject objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GameCustomizationObject
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
