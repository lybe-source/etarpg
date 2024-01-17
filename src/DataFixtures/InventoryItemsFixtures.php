<?php

namespace App\DataFixtures;

use App\Entity\InventoryItems;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class InventoryItemsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $inventoryItems = new InventoryItems();
        $manager->persist($inventoryItems);

        $manager->flush();
    }
}
