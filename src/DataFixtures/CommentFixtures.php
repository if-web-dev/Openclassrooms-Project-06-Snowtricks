<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $Comments =[ 
            'It\'s a very nice trick', 'Waaaa what the... awesome trick', 'Someone can explain better how can we do that?', 'How long trainning to do this?', 'How long trainning to do this?', 'Too risky',
        ];

        $author = $this->getReference(UserFixtures::USER_REFERENCE);

        //for 10 tricks
        for ($i = 0; $i <= 9; $i++) {

            //we add 6 comments
            foreach($Comments as $content){
                
                $trick = $this->getReference(TrickFixtures::TRICK_REFERENCE . $i);
                $message = new Comment();
                $message
                        ->setTrick($trick)
                        ->setAuthor($author)
                        ->setContent($content);
                        
                $manager->persist($message); 
            }
            
            $manager->flush();
        
        }
    }

    public function getDependencies(): array
    {
       return [
            UserFixtures::class,
            TrickFixtures::class,
        ];
    }
}
