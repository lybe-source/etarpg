<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categories = ["Casque", "Amulette", "Torse", "Gant", "Arme", "Bouclier", "Ceinture", "Pantalon", "Botte", "Bague"];

        foreach ($categories as $index => $cat) {
            $category = new Category();
            
            // Category setter
            $category->setName($cat);

            $manager->persist($category);

            $this->addReference('cat-' . $index, $category);
        }


        $manager->flush();
    }

    public function getCatByIndex($index)
    {
        return $this->getReference('cat-' . $index);
    }
}
