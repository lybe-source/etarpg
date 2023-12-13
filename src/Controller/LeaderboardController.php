<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/leaderboard', name: 'classement_')]
class LeaderboardController extends AbstractController
{
    private $cssClass = "leaderboard";

    #[Route('/', name: 'index')]
    public function index (): Response
    {
        $perso = "Perso";

        return $this->render('leaderboard/index.html.twig', [
            'perso' => $perso,
            'cssClass' => $this->cssClass,
        ]);
    }
}