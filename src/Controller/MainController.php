<?php

namespace App\Controller;

use App\Entity\Marque;
use App\Repository\AnnonceRepository;
use App\Repository\MarqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(AnnonceRepository $annonceRepository, MarqueRepository $marqueRepository): Response
    {
        return $this->render('main/index.html.twig', [
            'annonces' => $annonceRepository->findBy([
                'is_visible' => true
            ]),
            'marques' => $marqueRepository->findAll(),
        ]);
    }

    #[Route('/tab/{id}', name: 'app_marque_tab', methods: ['GET'])]
    public function tab(Marque $marque, MarqueRepository $marqueRepository, AnnonceRepository $annonceRepository): Response
    {
        return $this->render('tab.html.twig', [
            'brand' => $marque,
            'marques' => $marqueRepository->findAll(),
            'annonces' => $annonceRepository->findAll(),
        ]);
    }
}
