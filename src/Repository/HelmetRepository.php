<?php

namespace App\Repository;

use App\Entity\Helmet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Helmet>
 *
 * @method Helmet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Helmet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Helmet[]    findAll()
 * @method Helmet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HelmetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Helmet::class);
    }

//    /**
//     * @return Helmet[] Returns an array of Helmet objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('h.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Helmet
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
