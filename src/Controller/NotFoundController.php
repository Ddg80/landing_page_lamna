<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NotFoundController extends AbstractController
{
    #[Route('/', name: 'notFound')]
    public function index(Request $request): Response
    {
        return $this->render('notFound/index.html.twig');
    }

}