<?php

namespace App\Repository;

use App\Entity\Inventory;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Inventory>
 *
 * @method Inventory|null find($id, $lockMode = null, $lockVersion = null)
 * @method Inventory|null findOneBy(array $criteria, array $orderBy = null)
 * @method Inventory[]    findAll()
 * @method Inventory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InventoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Inventory::class);
    }

    public function totalScoreQuery(User $user): ?int
    {
        $inventory = $this->findOneBy(['user' => $user]);

        if (!$inventory) {
            return null;
        }

        $items = $inventory->getInventoryItems();

        $totalScore = 0;

        foreach ($items as $item) {
            $totalScore += $item->getItems()->getScore();
        }

        return $totalScore;
    }

    public function totalScoreAllUser(): array
    {
        $users = $this->_em->getRepository(User::class)->findAll();
        $totalScores = [];

        foreach ($users as $user) {
            $totalScore = $this->totalScoreQuery($user);
            $totalScores[$user->getId()] = $totalScore;
        }

        return $totalScores;
    }

    public function getAllUsersWithScores(User $currentUser): array
    {
        $query = $this->createQueryBuilder('i')
            ->select('u.username as username, i.totalScore as score')
            ->leftJoin('i.user', 'u')
            ->orderBy('CASE WHEN u.id = :userId THEN 1 ELSE 2 END', 'ASC')
            ->addOrderBy('i.totalScore', 'ASC')
            ->setParameter('userId', $currentUser->getId());

        return $query->getQuery()->getResult();
    }
}
