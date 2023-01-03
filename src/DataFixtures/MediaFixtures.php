<?php

namespace App\DataFixtures;

use App\Entity\Media;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Service\YoutubeThumbnail;

class MediaFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(){}
    public function load(ObjectManager $manager): void
    {
        
        $Media =[
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

        //for 10 Trick
        for($i=0; $i<=9; $i++){

            $trick = $this->getReference(TrickFixtures::TRICK_REFERENCE . $i);
           
            //add 3 media random + one the featured image
                $MediaItem = $Media[rand(0,2)];
                $type = array_keys($MediaItem)[0];
                $MediaData = array_values($MediaItem)[0];

                $media = new Media();
                $media->setType($type)
                      ->setContent($MediaData)
                      ->setTrick($trick)
                      ->setIsFeaturedImage(true);

            $manager->persist($media);

            for ($j = 0; $j <= 2; $j++){

                $MediaItem = $Media[rand(0,5)];
                $type = array_keys($MediaItem)[0];
                $MediaData = array_values($MediaItem)[0];
                if($type=="video"){
                    $thumbnail = YoutubeThumbnail::getThumbnail($MediaData);
                }
                
    
                $media = new Media();
                $media->setType($type)
                    ->setContent($MediaData)
                    ->setTrick($trick)
                    ->setIsFeaturedImage(false);
                    if($type == "video"){
                    $media->setThumbnail($thumbnail);
                    }
    
                $manager->persist($media);

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
