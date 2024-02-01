<?php

namespace App\Controller\Admin;

use App\Entity\Paragraph;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ParagraphCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Paragraph::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->add(Crud::PAGE_INDEX, Action::DETAIL)
        ->update(Crud::PAGE_INDEX, Action::NEW, function(Action $action){
            return $action->setIcon('fa-solid fa-paragraph')->addCssClass('btn btn-success');
        });
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextareaField::new('content'),
            TextField::new('caption'),
            TextField::new('imageFile')->setFormType(VichImageType::class),
            ImageField::new('ImageName')->setBasePath('/uploads/attachments')->onlyOnIndex(),
            AssociationField::new('post'),
            DateField::new('created_at')->renderAsChoice(),
            DateField::new('updated_at')->renderAsChoice(),
        ];
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
        ->add('title')
        ;
    }
}
