<?php

namespace App\Repository;

use App\Entity\Belt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Belt>
 *
 * @method Belt|null find($id, $lockMode = null, $lockVersion = null)
 * @method Belt|null findOneBy(array $criteria, array $orderBy = null)
 * @method Belt[]    findAll()
 * @method Belt[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BeltRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Belt::class);
    }

//    /**
//     * @return Belt[] Returns an array of Belt objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Belt
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
