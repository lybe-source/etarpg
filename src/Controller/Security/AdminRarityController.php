<?php

namespace App\Controller\Security;

use App\Entity\Rarity;
use App\Form\RarityType;
use App\Repository\RarityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/rarity', name: 'admin_rarity_')]
class AdminRarityController extends AbstractController
{
    private $cssClass = "admin";
    private $route_index = "admin_rarity_index";
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(RarityRepository $rarityRepo): Response
    {
        return $this->render('admin/rarity/index.html.twig', [
            'cssClass' => $this->cssClass,
            'rarities' => $rarityRepo->findAll(),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, RarityRepository $rarityRepo): Response
    {
        $rarity = new Rarity();
        $form = $this->createForm(RarityType::class, $rarity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dropRateValue = $form->get('drop_rate_hidden')->getData();
            $rarity->setDropRate($dropRateValue);
            
            $this->em->persist($rarity);
            $this->em->flush();

            $rarityRepo->save($rarity, true);
            
            return $this->redirectToRoute('admin_rarity_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/rarity/new.html.twig',[
            'cssClass' => $this->cssClass,
            'rarities' => $rarity,
            'routes' => $this->route_index,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Rarity $rarity, RarityRepository $rarityRepo): Response
    {
        $form = $this->createForm(RarityType::class, $rarity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rarity->setUpdatedAt(new \DateTimeImmutable());
            $rarityRepo->save($rarity, true);

            return $this->redirectToRoute('admin_rarity_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/rarity/edit.html.twig', [
            'cssClass' => $this->cssClass,
            'rarities' => $rarity,
            'routes' => $this->route_index,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Rarity $rarity, RarityRepository $rarityRepo): Response
    {
        if ($this->isCsrfTokenValid('admin/rarity/delete' . $rarity->getId(), $request->request->get('_token'))) {
            $rarityRepo->remove($rarity, true);
        }

        return $this->redirectToRoute('admin_rarity_index', [], Response::HTTP_SEE_OTHER);
    }
}