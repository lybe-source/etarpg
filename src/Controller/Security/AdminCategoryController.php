<?php

namespace App\Controller\Security;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/category', name: 'admin_category_')]
#[IsGranted("ROLE_ADMIN")]
class AdminCategoryController extends AbstractController
{
    private $cssClass = "admin";
    private $route_index = "admin_category_index";

    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(CategoryRepository $categoryRepo): Response
    {
        return $this->render('admin/category/index.html.twig', [
            'cssClass' => $this->cssClass,
            'categories' => $categoryRepo->findAll(),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, CategoryRepository $categoryRepo): Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categoryRepo->save($category, true);

            $this->addFlash('success', 'Catégorie ajoutée avec succès');

            return $this->redirectToRoute('admin_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/category/new.html.twig',[
            'cssClass' => $this->cssClass,
            'categories' => $category,
            'routes' => $this->route_index,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Category $category, CategoryRepository $categoryRepo): Response
    {
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categoryRepo->save($category, true);
            
            $this->addFlash('success', 'Catégorie éditée avec succès');

            return $this->redirectToRoute('admin_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/category/edit.html.twig', [
            'cssClass' => $this->cssClass,
            'categories' => $category,
            'routes' => $this->route_index,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Category $category, CategoryRepository $categoryRepo): Response
    {
        if ($this->isCsrfTokenValid('admin/category/delete' . $category->getId(), $request->request->get('_token'))) {
            $categoryRepo->remove($category, true);
            
            $this->addFlash('success', 'Catégorie supprimée avec succès');
        }

        return $this->redirectToRoute('admin_category_index', [], Response::HTTP_SEE_OTHER);
    }
}