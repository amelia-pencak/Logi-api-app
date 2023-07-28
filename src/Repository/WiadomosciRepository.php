<?php

namespace App\Repository;

use App\Entity\Wiadomosci;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Wiadomosci>
 *
 * @method Wiadomosci|null find($id, $lockMode = null, $lockVersion = null)
 * @method Wiadomosci|null findOneBy(array $criteria, array $orderBy = null)
 * @method Wiadomosci[]    findAll()
 * @method Wiadomosci[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WiadomosciRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Wiadomosci::class);
    }

//    /**
//     * @return Wiadomosci[] Returns an array of Wiadomosci objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('w.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Wiadomosci
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
