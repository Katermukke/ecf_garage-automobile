<?php

namespace App\DataFixtures;

use App\Entity\Images;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ImagesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $fichiers = ['citroenDSGrise.png', '2cvRouge.jpeg'];

        foreach ($fichiers as $fichier) {
            $image = new Images();

            $file = new File(__DIR__ . '/../../public/css/assets/' . $fichier);
            $image->setFile($file);
            $image->setNom($fichier);
            $voiture = $this->getReference('voiture');
            $image->setVoituresOccasions($voiture);

            $manager->persist($image);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            VoituresOccasionsFixtures::class,
        ];
    }
}
