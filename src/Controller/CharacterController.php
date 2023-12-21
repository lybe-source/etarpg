<?php

namespace App\Controller;

use App\Entity\Inventory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/character', name: 'perso_')]
class CharacterController extends AbstractController
{

    private $security;
    private $em;
    private $cssClass = "character";

    public function __construct(Security $security, EntityManagerInterface $em)
    {
        $this->security = $security;
        $this->em = $em;
    }

    #[Route('/', name: 'index')]
    public function index (Request $request): Response
    {
        $user = $this->security->getUser();
        $inventory = $this->em->getRepository(Inventory::class)->findBy(['user' => $user]);

        return $this->render('character/index.html.twig', [
            'inventory' => $inventory,
            'cssClass' => $this->cssClass,
        ]);
    }
}