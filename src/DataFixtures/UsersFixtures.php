<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture
{
    public const ADMIN_USER_REFERENCE = 'ADMIN_USER_REFERENCE';
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }
    
    public function load(ObjectManager $manager)
    {
        $user = $this->createUserAdmin(); 
        $manager->persist($user);
        $manager->flush();
    }

    private function createUserAdmin() 
    {
        // Create user admin
        $user = new User();
        $user->setNickname("David");
        // $password = $this->hasher->hashPassword($user, 'passwordSecret');
        $user->setPassword('passwordSecret');   
        $user->setRoles(['ROLE_ADMIN']);
        $user->setEmail('test@gmail.com');
        $user->setIsVerified(true);
        $user->setCreatedAt(new \DateTimeImmutable());
        $user->setUpdatedAt(new \DateTime());
        $this->addReference(self::ADMIN_USER_REFERENCE, $user);
        return $user;
    }
}