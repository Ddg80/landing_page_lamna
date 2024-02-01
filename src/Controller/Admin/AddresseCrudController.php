<?php

namespace App\Controller\Admin;

use App\Entity\Addresse;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AddresseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Addresse::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW, Action::EDIT, Action::DELETE)
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('email')
        ];
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
        ->add('email')
        ;
    }
}
