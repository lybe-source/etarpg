<?php

namespace App\Repository;

use App\Entity\Boot;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Boot>
 *
 * @method Boot|null find($id, $lockMode = null, $lockVersion = null)
 * @method Boot|null findOneBy(array $criteria, array $orderBy = null)
 * @method Boot[]    findAll()
 * @method Boot[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BootRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Boot::class);
    }

//    /**
//     * @return Boot[] Returns an array of Boot objects
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

//    public function findOneBySomeField($value): ?Boot
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
