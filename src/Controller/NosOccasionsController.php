<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NosOccasionsController extends AbstractController
{
    #[Route('/nosOccasions', name: 'nosOccasions')]
    public function index(): Response
    {
        return $this->render('nosOccasions.html.twig', [
            'controller_name' => 'NosOccasionsController',
        ]);
    }
}
