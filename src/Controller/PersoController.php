<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'perso_')]
class PersoController extends AbstractController
{

    private $cssClass = "perso";

    #[Route('/', name: 'index')]
    public function index (): Response
    {
        $perso = "Perso";

        return $this->render('perso/index.html.twig', [
            'perso' => $perso,
            'cssClass' => $this->cssClass,
        ]);
    }
}