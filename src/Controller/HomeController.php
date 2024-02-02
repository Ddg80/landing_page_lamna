<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\Addresse;
use App\Form\AddresseFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $posts = [];
        // Create new Addresse email
        $addresseEmail = new Addresse();
        $addresseEmail->setEmail('');

        // Create form
        $addresseEmailForm = $this->createForm(AddresseFormType::class, $addresseEmail);

        // Form via request
        $addresseEmailForm->handleRequest($request);

        //Check form
        if($addresseEmailForm->isSubmitted() && $addresseEmailForm->isValid()) {

            $entityManagerInterface->persist($addresseEmail);
            // Persist object in Bdd
            $entityManagerInterface->flush();

            $this->addFlash('success', 'Bravo! Votre email a bien été enregistré.');
            $addresseEmail->setEmail('');
            return $this->redirectToRoute('home');
        }

        // 3 last articles
        $postRepository = $entityManagerInterface->getRepository(Post::class);
        $posts = $postRepository->hydratedFindOnly3Posts();

        // dd($posts);

        return $this->render('home/index.html.twig', [
            'addresseEmailForm' => $addresseEmailForm->createView(),
            'posts' => $posts
        ]);
    }
}
