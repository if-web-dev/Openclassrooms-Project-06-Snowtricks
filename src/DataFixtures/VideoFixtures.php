<?php

namespace App\DataFixtures;

use App\Entity\Video;
use App\Service\YoutubeThumbnail;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VideoFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
      
        $media = ['https://www.youtube.com/watch?v=5ylWnm4rF1o','https://www.youtube.com/watch?v=4vGEOYNGi_c','https://www.youtube.com/watch?v=TTgeY_XCvkQ'];

        //for 10 Tricks
        for ($i = 0; $i <= 9; $i++) {

            $trick = $this->getReference(TrickFixtures::TRICK_REFERENCE . $i);

            //add 2 videos random 

            for ($j = 0; $j <= 1; $j++) {

                $videoUrl = $media[rand(0, 2)];

                $thumbnail = YoutubeThumbnail::getThumbnail($videoUrl);

                $video = new Video();
                $video
                      ->setUrl($videoUrl)
                      ->setTrick($trick)
                      ->setThumbnail($thumbnail);

                $manager->persist($video);
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