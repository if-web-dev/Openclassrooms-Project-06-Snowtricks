<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoryFixtures extends Fixture
{
    public const CATEGORY_REFERENCE = 'category-';
    public function load(ObjectManager $manager): void
    {
        $categories = ['slide','grab','old school','rotation','flip'];

        foreach($categories as $index => $name){
            $category = new Category();
            $category->setName($name);
            $this->addReference(self::CATEGORY_REFERENCE . $index, $category);
            $manager->persist($category);
        }

        $manager->flush();
    }
}
