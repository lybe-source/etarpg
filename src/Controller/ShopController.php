<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/shop', name: "boutique_")]
class ShopController extends AbstractController
{
    private $cssClass = "shop";

    #[Route('/', name: "index")]
    public function index (): Response
    {
        $perso = "Perso";

        return $this->render('shop/index.html.twig', [
            'perso' => $perso,
            'cssClass' => $this->cssClass,
        ]);
    }
}