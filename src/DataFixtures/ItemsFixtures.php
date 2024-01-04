<?php

namespace App\DataFixtures;

use App\Entity\Items;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class ItemsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $item = new Items();
        $manager->persist($item);

        $manager->flush();
    }
}
