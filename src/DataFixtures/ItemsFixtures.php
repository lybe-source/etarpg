<?php

namespace App\DataFixtures;

use App\Entity\Items;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class ItemsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 100; $i++) {
            $item = new Items();

            // Item setter with Faker
            $item->setName($faker->text(30)); // string
            $item->setDescription($faker->text()); // string
            $item->setScore($faker->numberBetween(10, 100)); // integer
            $item->setFilename("rpg-256.png"); // string

            $category = $this->getReference('cat-' . rand(0, 9));
            $item->setCategory($category);

            $rarity = $this->getReference('rare-' . rand(0, 2));
            $item->setRarity($rarity);

            $stat = $this->getReference('stat-' . rand(0, 11));
            $item->setStat($stat);

            $manager->persist($item);

            $this->addReference('item-' . $i, $item);
        }

        $manager->flush();
    }

    public function getItemByIndex($i)
    {
        return $this->getReference('item' . $i);
    }

    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class,
            RarityFixtures::class,
            StatisticsFixtures::class
        ];
    }
}
