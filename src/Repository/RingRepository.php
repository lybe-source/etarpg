<?php

namespace App\Repository;

use App\Entity\Ring;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ring>
 *
 * @method Ring|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ring|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ring[]    findAll()
 * @method Ring[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ring::class);
    }

//    /**
//     * @return Ring[] Returns an array of Ring objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Ring
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
