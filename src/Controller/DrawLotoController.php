<?php

namespace App\Controller;

use App\Repository\DrawLotoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DrawLotoController extends AbstractController
{
    #[Route('/tirageLoto', name: 'app_draw_loto')]
    public function index(DrawLotoRepository $repository): Response
    {
        $draws = $repository->findAll();

        return $this->render('pages/draw_loto/index.html.twig', [
            'draws' => $draws,
            'controller_name' => 'DrawLotoController',
        ]);
    }
}
