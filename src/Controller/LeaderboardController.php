<?php

namespace App\Controller;

use App\Entity\Inventory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/leaderboard', name: 'classement_')]
class LeaderboardController extends AbstractController
{
    private $security;
    private $em;
    private $cssClass = "leaderboard";

    public function __construct(Security $security, EntityManagerInterface $em)
    {
        $this->security = $security;
        $this->em = $em;
    }

    #[Route('/', name: 'index')]
    public function index (): Response
    {
        $user = $this->security->getUser();

        // $totalScore = $this->em->getRepository(Inventory::class)->totalScoreQuery($user);
        // $totalScores = $this->em->getRepository(Inventory::class)->totalScoreAllUser();
        $usersWithScores = $this->em->getRepository(Inventory::class)->getAllUsersWithScores($user);

        // dd($totalScores);

        return $this->render('leaderboard/index.html.twig', [
            // 'totalScore' => $totalScore,
            // 'totalScores' => $totalScores,
            'usersWithScores' => $usersWithScores,
            'cssClass' => $this->cssClass,
        ]);
    }
}