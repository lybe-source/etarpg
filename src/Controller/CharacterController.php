<?php

namespace App\Controller;

use App\Entity\Inventory;
use App\Entity\InventoryItems;
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
        $page = $request->query->getInt('page', 1);
        $limit = 10;

        $inventoryData = $this->em->getRepository(InventoryItems::class)->inventoryPaginated($page, $user, $limit);
        $money = $this->em->getRepository(Inventory::class)->findBy(['user' => $user]);

        // Check if the "data" key exists in $inventoryData
        if (!array_key_exists('data', $inventoryData)) {
            $inventoryData['data'] = [];
        }

        $itemsByCategory = [];
        foreach ($inventoryData['data'] as $inventoryItem) {
            $categoryName = $inventoryItem->getItems()->getCategory()->getName();
            $itemsByCategory[$categoryName][] = $inventoryItem;
        }

        return $this->render('character/index.html.twig', [
            'money' => $money,
            'inventory' => $itemsByCategory,
            'cssClass' => $this->cssClass,
        ]);
    }
}