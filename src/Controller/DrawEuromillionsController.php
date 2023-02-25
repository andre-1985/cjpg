<?php

namespace App\Controller;

use App\Repository\DrawEuromillionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DrawEuromillionsController extends AbstractController
{
    #[Route('/tirageEuromillions', name: 'app_draw_euromillions')]
    public function index(DrawEuromillionsRepository $repository): Response
    {
        $draws = $repository->findAll();

        return $this->render('pages/draw_euromillions/index.html.twig', [
            'draws' => $draws,
            'controller_name' => 'DrawEuromillionsController'
        ]);
    }

    #[Route('/rechercheTirageEuromillions', name: 'app_search_euromillions')]
    public function search(): Response {
        return $this->render('pages/draw_euromillions/search.html.twig');
    }
}
