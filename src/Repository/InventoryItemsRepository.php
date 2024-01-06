<?php

namespace App\Repository;

use App\Entity\InventoryItems;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
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

    // Paginate inventory
    public function inventoryPaginated(int $page, User $user, int $limit = 10): array
    {
        $limit = abs($limit);

        $result = [];

        $query = $this->getEntityManager()->createQueryBuilder()
            ->select('i')
            ->from('App\Entity\InventoryItems', 'i')
            ->where('i.inventory = :userInventory')
            ->setParameter('userInventory', $user->getInventory())
            ->setMaxResults($limit)
            ->setFirstResult(($limit * $page) - $limit);

        $paginator = new Paginator($query);
        $data = $paginator->getQuery()->getResult();

        if (empty($data)) {
            return $result;
        }

        foreach ($data as $inventoryItem) {
            $inventoryItem->getItems()->initializeLazyObject();
        }

        $pages = ceil($paginator->count() / $limit);

        $result['data'] = $data;
        $result['pages'] = $pages;
        $result['page'] = $page;
        $result['limit'] = $limit;

        return $result;
    }

}
