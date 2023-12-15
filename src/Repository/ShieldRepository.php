<?php

namespace App\Repository;

use App\Entity\Shield;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Shield>
 *
 * @method Shield|null find($id, $lockMode = null, $lockVersion = null)
 * @method Shield|null findOneBy(array $criteria, array $orderBy = null)
 * @method Shield[]    findAll()
 * @method Shield[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShieldRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Shield::class);
    }

//    /**
//     * @return Shield[] Returns an array of Shield objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Shield
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
