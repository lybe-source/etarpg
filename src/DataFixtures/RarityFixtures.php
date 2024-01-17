<?php

namespace App\DataFixtures;

use App\Entity\Rarity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RarityFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $rarities = ["Commun", "Rare", "Épique"];
        $dropRate = [75, 50, 20];
        $description = ["Facile", "Moyen", "Difficile"];

        foreach ($rarities as $index => $rare) {
            $rarity = new Rarity();

            // rarity setter
            $rarity->setName($rare);
            $rarity->setDropRate($dropRate[$index]);
            $rarity->setDescription("Taux de loot : " . $description[$index]);

            $manager->persist($rarity);

            $this->addReference('rare-' . $index, $rarity);
        }

        $manager->flush();
    }

    public function getRarityByIndex($index)
    {
        return $this->getReference('rare-' . $index);
    }
}
