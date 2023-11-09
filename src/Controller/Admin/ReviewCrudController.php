<?php

namespace App\Controller\Admin;

use App\Entity\Review;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ReviewCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Review::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield from parent::configureFields($pageName);

        yield ChoiceField::new('rate', 'Note')->setChoices([
            '1 étoile' => 1,
            '2 étoiles' => 2,
            '3 étoiles' => 3,
            '4 étoiles' => 4,
            '5 étoiles' => 5,
        ])->renderExpanded();
        yield AssociationField::new('movie', 'Film');
        yield AssociationField::new('user', 'Utilisateur');
    }

}
