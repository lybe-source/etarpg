<?php

namespace App\Repository;

use App\Entity\Glove;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Glove>
 *
 * @method Glove|null find($id, $lockMode = null, $lockVersion = null)
 * @method Glove|null findOneBy(array $criteria, array $orderBy = null)
 * @method Glove[]    findAll()
 * @method Glove[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GloveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Glove::class);
    }

//    /**
//     * @return Glove[] Returns an array of Glove objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Glove
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
