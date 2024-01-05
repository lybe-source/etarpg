<?php

namespace App\Repository;

use App\Entity\InventoryItems;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<InventoryItems>
 *
 * @method InventoryItems|null find($id, $lockMode = null, $lockVersion = null)
 * @method InventoryItems|null findOneBy(array $criteria, array $orderBy = null)
 * @method InventoryItems[]    findAll()
 * @method InventoryItems[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InventoryItemsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InventoryItems::class);
    }

//    /**
//     * @return InventoryItems[] Returns an array of InventoryItems objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?InventoryItems
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
