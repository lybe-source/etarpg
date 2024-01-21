<?php

namespace App\DataFixtures;

use App\Entity\Inventory;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $user = new User();

            // User setter with Faker
            $replace = array(" ", ".");
            $user->setUsername(str_replace($replace, '_', $faker->name()));
            $user->setEmail($faker->email());

            $user->setDiscordId(str_replace($replace, 'x', $faker->text(32))); // string
            $user->setAvatar(str_replace($replace, 'x', $faker->text(32))); // string
            $user->setAccessToken(str_replace($replace, 'x', $faker->text())); // string
            
            $inventory = new Inventory();
        
            $inventory->setUser($user);
            $inventory->setTotalScore(0);
            $inventory->setMoney(0);

            $manager->persist($inventory);

            $user->setInventory($inventory);

            $manager->persist($user);

            $this->addReference('user-' . $i, $user);
            $this->addReference('inventory-' . $i, $inventory);
        }

        $manager->flush();
    }

    public function getUserByIndex($i)
    {
        return $this->getReference('user-' . $i);
    }

    public function getInventoryByIndex($i)
    {
        return $this->getReference('inventory-' . $i);
    }
}
