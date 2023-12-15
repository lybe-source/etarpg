<?php

namespace App\Repository;

use App\Entity\Trouser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Trouser>
 *
 * @method Trouser|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trouser|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trouser[]    findAll()
 * @method Trouser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrouserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trouser::class);
    }

//    /**
//     * @return Trouser[] Returns an array of Trouser objects
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

//    public function findOneBySomeField($value): ?Trouser
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
