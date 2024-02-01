<?php

namespace App\EntityListener;

use App\Entity\User;
use Doctrine\ORM\Events;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsEntityListener(event: Events::prePersist, method: 'prePresist', entity: User::class)]
#[AsEntityListener(event: Events::preUpdate, method: 'preUpdate', entity: User::class)]
class UserEntityListener
{
    private $hashPassword;

    public function __construct(UserPasswordHasherInterface $userPasswordHasherInterface)
    {
        $this->hashPassword = $userPasswordHasherInterface;
    }

    public function prePresist(User $user) 
    {
        $this->encodePassword($user);
    }

    public function preUpdate(User $user) 
    {
        $this->encodePassword($user);
    } 

    /**
     * Encode password based on plain password
     * @param User $user
     * return void
     */
    public function encodePassword(User $user) 
    {
        if($user->getPassword() === null) {
            return;
        }

        $user->setPassword(
            $this->hashPassword->hashPassword(
                $user,
                $user->getPassword()
            )
        );

    }
}