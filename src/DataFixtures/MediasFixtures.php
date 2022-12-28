<?php

namespace App\DataFixtures;

use App\Entity\Medias;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MediasFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(){}
    public function load(ObjectManager $manager): void
    {
        
        $Medias =[
            [
                'image' => 'https://c1.staticflickr.com/5/4052/4382456868_8b8a9733a3_b.jpg',
            ],
            [
                'image' => 'https://www.muchawesome.com/wp-content/uploads/2020/12/Snowboarder-Doing-Balance-Trick.jpg'
            ],
            [
                'image' => 'https://holidayswithkids.com.au/wp-content/uploads/2021/03/HWK-image-size-7.jpg',
            ],
            [
                'video' => 'https://www.youtube.com/watch?v=5ylWnm4rF1o',
            ],
            [
                'video' => 'https://www.youtube.com/watch?v=4vGEOYNGi_c',
            ],
            [
                'video' => 'https://www.youtube.com/watch?v=TTgeY_XCvkQ',
            ],
        ];

        foreach ($Medias as $index => $mediaDatas) {
            $counter = 1;
            $trick = $this->getReference(TricksFixtures::TRICK_REFERENCE . $index);
            $counter++;
            $type = array_keys($mediaDatas)[0];
            $medias = array_values($mediaDatas)[0];

            $media = new Medias();
            $media->setType($type)
                ->setImage(($type=='image')?$medias : null)
                ->setVideo(($type=='video')?$medias: null)
                ->setTrick($trick);

            $manager->persist($media);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
       return [
            UsersFixtures::class,
            TricksFixtures::class,
        ];
    }
}
