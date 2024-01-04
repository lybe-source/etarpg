<?php

namespace App\Controller\Security;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin', name: 'admin_')]
#[IsGranted("ROLE_ADMIN")]
class AdminController extends AbstractController
{
    private $cssClass = "admin";

    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'cssClass' => $this->cssClass,
        ]);
    }
}