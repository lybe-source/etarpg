<?php

namespace App\Controller\Security;

use App\Entity\Statistics;
use App\Form\StatisticsType;
use App\Repository\StatisticsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/statistics', name: 'admin_statistics_')]
class AdminStatisticsController extends AbstractController
{
    private $cssClass = "admin";
    private $route_index = "admin_statistics_index";
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(StatisticsRepository $statisticsRepo): Response
    {
        return $this->render('admin/statistics/index.html.twig', [
            'cssClass' => $this->cssClass,
            'statistics' => $statisticsRepo->findAll(),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, StatisticsRepository $statisticsRepo): Response
    {
        $statistics = new Statistics();
        $form = $this->createForm(StatisticsType::class, $statistics);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $amountValue = $form->get('amount_hidden')->getData();
            $statistics->setAmount($amountValue);

            $this->em->persist($statistics);
            $this->em->flush();

            $statisticsRepo->save($statistics, true);
            
            return $this->redirectToRoute('admin_statistics_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/statistics/new.html.twig',[
            'cssClass' => $this->cssClass,
            'statistics' => $statistics,
            'routes' => $this->route_index,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Statistics $statistics, StatisticsRepository $statisticsRepo): Response
    {
        $form = $this->createForm(StatisticsType::class, $statistics);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $statistics->setUpdatedAt(new \DateTimeImmutable());
            $statisticsRepo->save($statistics, true);

            return $this->redirectToRoute('admin_statistics_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/statistics/edit.html.twig', [
            'cssClass' => $this->cssClass,
            'statistics' => $statistics,
            'routes' => $this->route_index,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Statistics $statistics, StatisticsRepository $statisticsRepo): Response
    {
        if ($this->isCsrfTokenValid('admin/statistics/delete' . $statistics->getId(), $request->request->get('_token'))) {
            $statisticsRepo->remove($statistics, true);
        }

        return $this->redirectToRoute('admin_statistics_index', [], Response::HTTP_SEE_OTHER);
    }
}