<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoriesFixtures extends Fixture
{
    public const CATEGORY_REFERENCE = 'category-';
    public function load(ObjectManager $manager): void
    {
        $categories = [
            'slide',
            'grab',
            'old school',
            'rotation',
            'flip'
        ];

        foreach($categories as $index => $name){
            $category = new Categories();
            $category->setName($name);
            $this->addReference(self::CATEGORY_REFERENCE . $index, $category);
            $manager->persist($category);
        }

        $manager->flush();
    }
}
