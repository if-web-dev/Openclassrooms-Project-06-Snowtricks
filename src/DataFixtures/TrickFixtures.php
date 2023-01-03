<?php

namespace App\DataFixtures;

use App\Entity\Trick;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

use function Symfony\Component\String\u;

class TrickFixtures extends Fixture implements DependentFixtureInterface
{
    public const TRICK_REFERENCE = 'trick-';
    public function __construct( private readonly SluggerInterface $slugger) 
    {}

    public function load(ObjectManager $manager): void
    {
       
        $user = $this->getReference(UserFixtures::USER_REFERENCE);

        $tricks = [
            [
                'name' => '360',
                'description' => 'The 3.6 front or frontside 3 is an interesting trick because you can easily put a lot of style on it. It\'s a 360 degree rotation on the frontside (left for regulars and right for goofys). Like the 3.6 back, the speed of rotation is quite easy to manage, but if the impulse seems more obvious when throwing the shoulders in front, the landing is much less so because you are from behind the last quarter of the jump. This is called blind side reception…'
            ],
            [
                'name' => '720',
                'description' => 'There’s a trick to doing the 720 and gaining full control of your movement in the air. What you need to do is divide the rotation into several spins and perform them on 2 jumps, one after the other. Imagine yourself performing the rotation. Divide it into two 360s. At the end of the kicker, begin executing the movement, moving your hands simultaneously and turning your head. Spin the first 270 straight, then draw up your legs and turn your shoulders in the direction of rotation, spinning the second 360. Land the trick, cushioning your impact onto the front edge.',
            ],
            [
                'name' => 'Front Flip',
                'description' => 'The frontflip is one of the easiest flips on the snowboard. Before trying it out on the snow, practice the flip on a trampoline. Accelerate on a flat board. To get into a good spin, push onto the tail before the jump, and then quickly shift forward and push off with your front leg. Make sure your shoulders are parallel to the board. Once in the air, draw up your knees and find your landing spot. Land your board flat.',
            ],
            [
                'name' => 'Back Flip',
                'description' => 'A noseslide is a skateboarding trick in which you slide on a rail (or curb) on the nose edge (the front end) of your skateboard. You\'ll need to know a few other fundamental tricks before you\'re able to master a noseslide, including an ollie, kickturn, and frontside 180s.',
            ],
            [
                'name' => 'Nose Slide',
                'description' => 'The rear hand reaches between the legs and grabs the heel edge between the bindings while the front leg is boned. The wrist is rotated inward to complete the grab.',
            ],
            [
                'name' => 'Tail Slide',
                'description' => 'Pressing your snowboard (sometimes called "buttering") is the act of leaning your weight over either the nose (nosepress) or tail (tailpress) of the board in such a way that the opposite end of the board is off the snow (or feature).',
            ],
            [
                'name' => 'Mute',
                'description' => 'A Mute grab is where the front hand grabs the toe edge between the feet. The board is kept flat. The Mute grab can initially feel awkward, but persevere. Grab the toe edge between the bindings with your front hand.',
            ],
            [
                'name' => 'Stalefish',
                'description' => 'stalefish (plural stalefishes) (skateboarding) A grab in which the rear hand holds the heelside edge of the snowboard.',
            ],
            [
                'name' => 'Backside Air',
                'description' => 'Like frontside\'s, the backside air is a move you learn from day one, and spend the rest of your life refining and pushing. The Method air is basically a backside air with extra tweak – old school, but a timeless expression of style. Christian Hosoi perfected them in the eighties on a skateboard, Jamie Lynn did the same on snow in the nineties...and as soon as you\'re getting some',
            ],
            [
                'name' => 'Method Air',
                'description' => 'method air (plural method airs) (snowboarding, skateboarding) A trick where the boarder grabs the heel edge of the board with their front hand, between their feet, and then pulls the board towards their back, while arching their back and bending knees.',
            ],
        ];

        foreach ($tricks as $index => $trickData) {
            $randNbr = mt_rand(0, 4);
            $category = $this->getReference(CategoryFixtures::CATEGORY_REFERENCE . $randNbr);

            $trick = new Trick();
            $trick->setAuthor($user)
                ->setName($trickData['name'])
                ->setSlug(u($this->slugger->slug($trick->getName()))->lower())
                ->setDescription($trickData['description'])
                ->setCategory($category)
            ;
            $this->addReference(self::TRICK_REFERENCE . $index, $trick); 
            $manager->persist($trick);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
            CategoryFixtures::class,
        ];
    }
}