<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository\HorairesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function contact(Request $request, HorairesRepository $horairesRepository): Response
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        }

        return $this->render('contact.html.twig', [
            'contactForm' => $form->createView(),
            'horaires' => $horairesRepository->findBy([])
        ]);
    }
}
