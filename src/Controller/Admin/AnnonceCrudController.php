<?php

namespace App\Controller\Admin;

use App\Entity\Annonce;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Intl\Languages;

\Locale::setDefault('en');
$language = Languages::getName('fr');
$language = Languages::getAlpha3Name('fra');

class AnnonceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Annonce::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('titre');//
        yield TextareaField::new('description'); 
        yield TextField::new('infotechniques'); //
        yield TextField::new('marque');
        yield NumberField::new('prix');//
        yield NumberField::new('annee'); //
        yield NumberField::new('kilometrage');//
        yield TextField::new('carburant');
        yield TextField::new('boite_vitesse');
        yield TextareaField::new('imageFile')->setFormType(VichImageType::class);
    }
}
