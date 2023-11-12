<?php

namespace App\DataFixtures;

use App\Entity\Marques;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MarquesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $marque = new Marques();
        // $marque->setNomMarques('Citroën');
        // $manager->persist($marque);
        // $manager->flush();
    }
}
