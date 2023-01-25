<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Image;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ImageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $Medias =['jump1.jpg','jump2.jpg','jump3.jpg'];

        //for 10 Trick
        for($i=0; $i<=9; $i++){

            //add 2 images random

            $trick = $this->getReference(TrickFixtures::TRICK_REFERENCE.$i);

            for ($j = 0; $j <= 1; $j++){

                $imagePath = $Medias[rand(0,2)];

                $image = new Image();
                $image
                      ->setPath($imagePath)
                      ->setTrick($trick);
                      
                $manager->persist($image);

            }

        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
       return [
            UserFixtures::class,
            TrickFixtures::class,
        ];
    }
}
