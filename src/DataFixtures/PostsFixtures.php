<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class PostsFixtures extends Fixture
{


    public function __construct(private SluggerInterface $sluggerInterface)
    {
    }

    public function load(ObjectManager $manager)
    {
        // for ($i = 0; $i < 10; $i++) {
        //     $post = $this->createPost();
        //     $manager->persist($post);
        // }
        // $manager->flush();
    }

    private function createPost()
    {
        // $categorie = $this->getReference(CategoriesFixtures::CATEGORY . '_' . rand(0, 3));
        // $admin = $this->getReference(UsersFixtures::ADMIN_USER_REFERENCE);
        // $post = new Posts();
        // $post->setTitle('Diam suspendisse lectus feugiat quis donec aliquadio faucibus ut aliquet cras mus etiam.');
        // $post->setSlug($this->sluggerInterface->slug(trim(substr($post->getTitle(), 0, 20)))->lower());
        // $post->setCreatedAt(new DateTimeImmutable());
        // $post->setContent('Aliquet blandit scelerisque massa et nulla sagittis. Fringilla dui molestie volutpat in congue magnis malesuada egestas. Sem ullamcorper proin placerat fusce id viverra congue. Velit laoreet nulla sapien nunc tincidunt sagittis arcu vivamus. Semper mi tellus neque morbi donec.');
        // $post->addCategory($categorie);
        // $post->setUsers($admin);
        // $post->setFeaturedImage("assets/images/articles/image_article" . rand(1, 3) . ".png");
        // return $post;
    }
}
