<?php

namespace App\Controller\Security;

use App\Entity\Items;
use App\Form\ItemsType;
use App\Repository\ItemsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/items', name: 'admin_items_')]
class AdminItemsController extends AbstractController
{
    private $cssClass = "admin";
    private $route_index = "admin_items_index";
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(ItemsRepository $itemsRepo): Response
    {
        return $this->render('admin/items/index.html.twig', [
            'cssClass' => $this->cssClass,
            'items' => $itemsRepo->findAll(),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, ItemsRepository $itemsRepo): Response
    {
        $items = new Items();
        $form = $this->createForm(ItemsType::class, $items);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $amountValue = $form->get('amount_hidden')->getData();
            // $statistics->setAmount($amountValue);

            // $this->em->persist($statistics);
            // $this->em->flush();

            $itemsRepo->save($items, true);
            
            return $this->redirectToRoute('admin_items_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/items/new.html.twig',[
            'cssClass' => $this->cssClass,
            'items' => $items,
            'routes' => $this->route_index,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Items $items, ItemsRepository $itemsRepo): Response
    {
        $form = $this->createForm(ItemsType::class, $items);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $items->setUpdatedAt(new \DateTimeImmutable());
            $itemsRepo->save($items, true);

            return $this->redirectToRoute('admin_items_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/items/edit.html.twig', [
            'cssClass' => $this->cssClass,
            'items' => $items,
            'routes' => $this->route_index,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Items $items, ItemsRepository $itemsRepo): Response
    {
        if ($this->isCsrfTokenValid('admin/items/delete' . $items->getId(), $request->request->get('_token'))) {
            $itemsRepo->remove($items, true);
        }

        return $this->redirectToRoute('admin_items_index', [], Response::HTTP_SEE_OTHER);
    }
}