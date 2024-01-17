<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $user = new User();

            // User setter
            $user->setUsername();
            $user->setEmail();

            $user->setDiscordId(); // string
            $user->setAvatar(); // string
            $user->setAccessToken(); // string

            // $user->setInventory(); // user id

            // $user->setLeaderboard(); // user id

            $manager->persist($user);

            $this->addReference('user-' . $i, $user);
        }

        $manager->flush();
    }

    public function getUserByIndex($i)
    {
        return $this->getReference('user-' . $i);
    }

    public function getDependencies(): array
    {
        return [
            InventoryItemsFixtures::class
        ];
    }
}
