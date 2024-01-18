<?php

namespace App\DataFixtures;

use App\Entity\Inventory;
use App\Entity\InventoryItems;
use App\Entity\Items;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;

class InventoryItemsFixtures extends Fixture implements DependentFixtureInterface
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function load(ObjectManager $manager): void
    {
        // Récupérer chaque items
        $allItems = $this->em->getRepository(Items::class)->findAll();
        $itemId = $this->em->getRepository(Items::class)->count([]);
        $inventoryId = $this->em->getRepository(Inventory::class)->count([]);

        // Assigner chaque items à un inventaire
        foreach ($allItems as $item) {
            $inventoryItems = new InventoryItems();

            // InventoryItems setter
            $inventoryRef = $this->getReference('inventory-' . rand(0, ($inventoryId - 1)));
            $itemRef = $this->getReference('item-' . rand(0, ($itemId - 1)));

            $inventoryItems->setInventory($inventoryRef); // inventory ref
            $inventoryItems->setItems($itemRef); // item ref

            $inventoryItems->setIsUsed(rand(0, 1));

            $manager->persist($inventoryItems);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ItemsFixtures::class,
            UserFixtures::class
        ];
    }
}
