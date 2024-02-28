<?php

namespace App\Controller;

use App\Repository\HorairesRepository;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\VoituresOccasionsRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class NosOccasionsController extends AbstractController
{
    #[Route('/nosOccasions', name: 'nosOccasions')]
    public function index(VoituresOccasionsRepository $voituresOccasionsRepository, HorairesRepository $horairesRepository, Request $request): Response
    {

        // On récupere les filtres 

        $filters = $request->get("voituresOccasions");
        dd($filters);
        // On verifie si on a une requete Ajax
        if ($request->get('ajax')) {
            return new Response("OK");
        }

        return $this->render('nosOccasions.html.twig', [
            'voituresOccasions' => $voituresOccasionsRepository->findBy([]),
            'horaires' => $horairesRepository->findBy([])
        ]);
    }
}
