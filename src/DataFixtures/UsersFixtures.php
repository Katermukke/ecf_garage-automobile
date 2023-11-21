<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setNom('Parrot');
        $admin->setPrenom('Vincent');
        $admin->setEmail('');
        $admin->setRoles(['']);
        $admin->setPassword(
            $this->passwordHasher->hashPassword($admin, '')
        );

        $manager->persist($admin);

        $employe = new User();
        $employe->setNom('Alderson');
        $employe->setPrenom('Eliot');
        $employe->setEmail('');
        $employe->setRoles(['']);
        $employe->setPassword(
            $this->passwordHasher->hashPassword($employe, '')
        );

        $manager->persist($employe);
        $manager->flush();
    }
}
