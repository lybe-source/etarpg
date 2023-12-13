<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/character', name: 'perso_')]
class CharacterController extends AbstractController
{

    private $cssClass = "perso";

    #[Route('/', name: 'index')]
    public function index (): Response
    {
        $perso = "Perso";

        return $this->render('character/index.html.twig', [
            'perso' => $perso,
            'cssClass' => $this->cssClass,
        ]);
    }
}