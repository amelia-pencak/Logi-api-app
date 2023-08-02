<?php

namespace App\Repository;

use App\Entity\Wiadomosc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Wiadomosc>
 *
 * @method Wiadomosc|null find($id, $lockMode = null, $lockVersion = null)
 * @method Wiadomosc|null findOneBy(array $criteria, array $orderBy = null)
 * @method Wiadomosc[]    findAll()
 * @method Wiadomosc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WiadomoscRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Wiadomosc::class);
    }

//    /**
//     * @return Wiadomosc[] Returns an array of Wiadomosc objects
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

//    public function findOneBySomeField($value): ?Wiadomosc
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
