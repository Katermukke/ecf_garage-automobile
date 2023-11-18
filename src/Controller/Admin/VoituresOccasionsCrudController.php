<?php

namespace App\Controller\Admin;

use App\Form\ImageType;
use App\Entity\VoituresOccasions;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

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
            CollectionField::new('voituresOcassionsImages', 'Images')
                ->setEntryType(ImageType::class),
            AssociationField::new('voituresOcassionsMarques', 'Selection marques'),
            NumberField::new('prix', 'Prix'),
            DateField::new('annee', 'Année'),
            NumberField::new('kilometrage'),
            TextField::new('carburant'),
            TextField::new('boiteDeVitesse'),
        ];
    }
}
