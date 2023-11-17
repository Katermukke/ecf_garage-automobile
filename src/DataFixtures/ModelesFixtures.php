<?php

namespace App\DataFixtures;

use App\Entity\Modeles;
use App\Entity\Marques;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ModelesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $modeleData = [
            ['nomModele' => '2 cv (2eme Generation) 0.6 29 special', 'nomMarque' => 'Citroën'],
            ['nomModele' => '2 cv (2eme Generation) 0.6 29 Charlestion', 'nomMarque' => 'Citroën'],
            ['nomModele' => '260Z 2+2', 'nomMarque' => 'Datsun'],
            ['nomModele' => 'DS 19 cabriolet', 'nomMarque' => 'Citroën'],
            ['nomModele' => '190 SL Cabriolet', 'nomMarque' => 'Mercedes'],
            ['nomModele' => '4l', 'nomMarque' => 'Renault'],
            ['nomModele' => 'MGA', 'nomMarque' => 'MG'],
            ['nomModele' => '2002 Tii Touring', 'nomMarque' => 'BMW'],
            ['nomModele' => 'Coccinelle', 'nomMarque' => 'Volkswagen'],
            ['nomModele' => '912 SWB', 'nomMarque' => 'Porsche'],
            ['nomModele' => 'Traction 11 B', 'nomMarque' => 'Citroën'],
        ];

        foreach ($modeleData as $data) {
            $modele = new Modeles();
            $modele->setNomModeles($data['nomModele']);

            $marque = $manager->getRepository(Marques::class)->findOneBy(['nomMarques' => $data['nomMarque']]);
            if ($marque) {
                $modele->setMarquesModeles($marque);
            }

            $manager->persist($modele);
        }

        $manager->flush();
    }
}
