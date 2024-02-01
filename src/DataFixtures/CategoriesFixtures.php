<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoriesFixtures extends Fixture
{
    public const CATEGORY = 'CATEGORY';
    private const CATEGORIES = ['Commerce local', 'Astuce voyage', 'Transport', 'Le projet'];

    public function load(ObjectManager $manager)
    {
        for ($i=0; $i < count(self::CATEGORIES); $i++) { 
            $category = $this->createCategory($i);
            $manager->persist($category);
        }
        
        $manager->flush();
    }   

    private function createCategory($i) 
    {
        $category = new Categorie();
        $category->setName(self::CATEGORIES[$i]);
        $category->setCreatedAt(new \DateTimeImmutable());
        $category->setUpdatedAt(new \DateTime());
        $this->addReference(self::CATEGORY.'_'.$i, $category); 
        return $category;
    }
}