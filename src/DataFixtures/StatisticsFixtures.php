<?php

namespace App\DataFixtures;

use App\Entity\Statistics;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StatisticsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $statsName = ["Armure", "Force", "Vitesse de frappe"];
        $statsDesc = ["Très faible", "Faible", "Bonne", "Très bonne"];
        $stats = [5, 10, 15, 20];

        foreach ($statsName as $nameIndex => $statName) {

            foreach ($stats as $statIndex => $stat) {
                $index = ($nameIndex * count($stats)) + $statIndex;
                $statistics = new Statistics();
    
                // Stat setter
                $statistics->setName($statName);
                $statistics->setAmount($stat);
                $statistics->setDescription($statsDesc[$statIndex]);
    
                $manager->persist($statistics);
    
                $this->setReference('stat-' . $index, $statistics);
            }
        }

        $manager->flush();
    }

    public function getStatByIndex($index)
    {
        return $this->getReference('stat-' . $index);
    }
}
