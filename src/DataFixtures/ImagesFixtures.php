<?php

namespace App\DataFixtures;

use App\Entity\Images;
use App\Entity\VoituresOccasions;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ImagesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Récupérer les voitures
        $voiture1 = $manager->getRepository(VoituresOccasions::class)->find(1);
        $voiture2 = $manager->getRepository(VoituresOccasions::class)->find(2);

        // Créer une image pour la première voiture
        if ($voiture1) {
            $image1 = new Images();
            // $image1->setFile('public/css/assets/newGreatThings.png');
            $image1->setVoituresOccasions($voiture1);
            $manager->persist($image1);
        }

        // Créer une image pour la seconde voiture
        if ($voiture2) {
            $image2 = new Images();
            // $image2->setFile('public/css/assets/voitureRouiller.png');
            $image2->setVoituresOccasions($voiture2);
            $manager->persist($image2);
        }

        // Flush pour enregistrer en base de données
        $manager->flush();
    }
}
