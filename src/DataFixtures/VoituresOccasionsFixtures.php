<?php

namespace App\DataFixtures;

use App\Entity\VoituresOccasions;
use App\Entity\Modeles;
use App\Entity\Marques;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VoituresOccasionsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $voituresData = [
            [
                'prix' => 10000,
                'annee' => new \DateTime('2010-01-01'),
                'kilometrage' => 50000,
                'carburant' => 'Essence',
                'boiteDeVitesse' => 'Manuelle',
                'nomMarque' => 'Citroën',
                'nomModele' => '2 cv (2eme Generation) 0.6 29 special'

            ],
        ];

        foreach ($voituresData as $data) {
            $voiture = new VoituresOccasions();
            $voiture->setPrix($data['prix']);
            $voiture->setAnnee($data['annee']);
            $voiture->setKilometrage($data['kilometrage']);
            $voiture->setCarburant($data['carburant']);
            $voiture->setBoiteDeVitesse($data['boiteDeVitesse']);


            $marque = $manager->getRepository(Marques::class)->findOneBy(['nomMarques' => $data['nomMarque']]);
            if ($marque) {
                $voiture->setVoituresOcassionsMarques($marque);

                // Si nécessaire, vous pouvez également récupérer un modèle spécifique de cette marque
                // et l'utiliser pour une logique supplémentaire
                $modele = $manager->getRepository(Modeles::class)->findOneBy([
                    'marquesModeles' => $marque,
                    'nomModeles' => $data['nomModele']
                ]);
                // Utilisez $modele pour une logique spécifique si nécessaire...
            }

            $manager->persist($voiture);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            MarquesFixtures::class,
            ModelesFixtures::class,
        ];
    }
}
