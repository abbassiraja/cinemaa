<?php

namespace App\Controller\Admin;

use App\Entity\Cinema;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CinemaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cinema::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom_cinema'),
            TextField::new('adresse'),
            TextField::new('num_tel'),
            TextField::new('email'),
            TextField::new('mot_de_passe'),
            ImageField::new('image'),
        ];
    }
    
}
