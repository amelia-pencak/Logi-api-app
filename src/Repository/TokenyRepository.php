<?php

namespace App\Repository;

use App\Entity\Tokeny;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Tokeny>
 *
 * @method Tokeny|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tokeny|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tokeny[]    findAll()
 * @method Tokeny[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TokenyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tokeny::class);
    }

//    /**
//     * @return Tokeny[] Returns an array of Tokeny objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Tokeny
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
