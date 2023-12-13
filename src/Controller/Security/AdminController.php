<?php

namespace App\Controller\Security;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'admin_')]
class AdminController extends AbstractController
{
    private $cssClass = "admin";

    #[Route('/', name: 'index')]
    public function index (): Response
    {

        return $this->render('admin/index.html.twig', [
            'cssClass' => $this->cssClass,
        ]);
    }
}