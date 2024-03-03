<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\AvisType;
use App\Repository\AvisRepository;
use App\Repository\HorairesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function home(Request $request, EntityManagerInterface $entityManager, AvisRepository $avisRepository, HorairesRepository $horairesRepository): Response
    {
        $avis = new Avis();
        $form = $this->createForm(AvisType::class, $avis);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($avis);
            $entityManager->flush();

            // Redirection ou traitement supplémentaire après la soumission
            // Par exemple, rediriger vers la page d'accueil
            return $this->redirectToRoute('home');
        }

        return $this->render('home.html.twig', [
            'avis' => $avisRepository->findBy([]),
            'horaires' => $horairesRepository->findBy([]),
            'form' => $form->createView()
        ]);
    }
}
