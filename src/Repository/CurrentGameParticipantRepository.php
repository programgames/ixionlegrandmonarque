<?php

namespace App\Repository;

use App\Entity\CurrentGameParticipant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CurrentGameParticipant|null find($id, $lockMode = null, $lockVersion = null)
 * @method CurrentGameParticipant|null findOneBy(array $criteria, array $orderBy = null)
 * @method CurrentGameParticipant[]    findAll()
 * @method CurrentGameParticipant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CurrentGameParticipantRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CurrentGameParticipant::class);
    }

    // /**
    //  * @return CurrentGameParticipant[] Returns an array of CurrentGameParticipant objects
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
    public function findOneBySomeField($value): ?CurrentGameParticipant
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
