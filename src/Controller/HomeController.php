<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'accueil_')]
class HomeController extends AbstractController
{
    private $cssClass = "";

    #[Route('/', name: 'index')]
    public function index (): Response
    {
        $perso = "Perso";

        return $this->render('home/index.html.twig', [
            'perso' => $perso,
            'cssClass' => $this->cssClass,
        ]);
    }

}