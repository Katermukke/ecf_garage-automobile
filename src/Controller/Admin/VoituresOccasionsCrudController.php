<?php

namespace App\Controller\Admin;

use App\Form\ImageType;
use App\Entity\VoituresOccasions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;

class VoituresOccasionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return VoituresOccasions::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            CollectionField::new('voituresOcassionsImages')
                ->setEntryType(imageType::class),
            NumberField::new('prix', 'Prix'),
            DateField::new('annee', 'Année'),
            NumberField::new('kilometrage'),
            TextField::new('carburant'),
            TextField::new('boiteDeVitesse'),
        ];
    }
}
