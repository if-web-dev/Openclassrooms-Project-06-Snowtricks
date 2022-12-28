<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture
{
    public const USER_REFERENCE = 'user';
    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder,
    ){}
    public function load(ObjectManager $manager): void
    {
        

        $user = new Users();
        $user->setUsername('User')
             ->setPassword($this->passwordEncoder->hashPassword(
                $user,
                'UserPassword'
            ))
            ->setToken(rand(1,9999))
            ->setIsVerified(1)
            ->setEmail('User@user.gmail')
            ->setRoles(['ROLE_USER']);

        $this->addReference(self::USER_REFERENCE, $user); 
        $manager->persist($user); 
        $manager->flush();

        
    }
}