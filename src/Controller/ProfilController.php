<?php

namespace App\Controller;

use App\Repository\AnnonceListByUserRepository;
use App\Repository\AnnonceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function index(AnnonceRepository $annonceRepo, AnnonceListByUserRepository $annonceListByUserRepository): Response
    {
        $user=$this->getUser();
        return $this->render('profil/index.html.twig', [
            'annonces' => $annonceRepo->findBy([
                'author'=>$user,
            ]),
            'annoncesFav' => $annonceListByUserRepository->findBy([
                'users'=>$user
            ])
        ]);
    }
}
