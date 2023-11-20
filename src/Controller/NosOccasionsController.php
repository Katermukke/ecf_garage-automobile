<?php

namespace App\Controller;

use App\Repository\HorairesRepository;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\VoituresOccasionsRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NosOccasionsController extends AbstractController
{
    #[Route('/nosOccasions', name: 'nosOccasions')]
    public function index(VoituresOccasionsRepository $voituresOccasionsRepository, HorairesRepository $horairesRepository): Response
    {
        return $this->render('nosOccasions.html.twig', [
            'voituresOccasions' => $voituresOccasionsRepository->findBy([]),
            'horaires' => $horairesRepository->findBy([])
        ]);
    }
}
