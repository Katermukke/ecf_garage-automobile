<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\VoituresOccasionsRepository;
use App\Repository\HorairesRepository;

class VoitureOccasionController extends AbstractController
{
    #[Route('/voitureOccasion/{id}', name: 'voitureOccasion')]
    public function show(int $id, VoituresOccasionsRepository $voituresOccasionsRepository, HorairesRepository $horairesRepository,): Response
    {
        $horaires = $horairesRepository->findAll();
        $voitureOccasion = $voituresOccasionsRepository->find($id);

        if (!$voitureOccasion) {
            throw $this->createNotFoundException(
                'Aucune voiture trouvée pour cet id ' . $id
            );
        }

        // Passer la voitureOccasion à la vue
        return $this->render('voitureOccasion.html.twig', [
            'voitureOccasion' => $voitureOccasion,
            'horaires' => $horaires
        ]);
    }
}