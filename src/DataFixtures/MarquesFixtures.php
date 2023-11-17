<?php

namespace App\DataFixtures;

use App\Entity\Marques;
use App\Entity\Modeles;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MarquesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $nomsMarques = ['Citroën', 'Datsun', 'Mercedes', 'Renault', 'MG', 'BMW', 'Volkswagen', 'Porsche'];
        $nomsModeles = [
            '2 cv (2eme Generation) 0.6 29 special',
            // ... autres modèles ...
        ];

        foreach ($nomsMarques as $nomMarque) {
            $marque = new Marques();
            $marque->setNomMarques($nomMarque);

            foreach ($nomsModeles as $nomModele) {
                $modele = new Modeles();
                $modele->setNomModeles($nomModele);
                $marque->addMarquesModele($modele);
                $manager->persist($modele);
            }

            $manager->persist($marque);
        }

        $manager->flush();
    }
}
