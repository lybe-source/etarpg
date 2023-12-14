<?php

namespace App\Controller\Security;

use App\Authenticator\DiscordAuthenticator;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Service\DiscordApiService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/discord', name: 'oauth_discord_')]
class DiscordController extends AbstractController
{
    private $cssClass = "";

    public function __construct(
        private readonly DiscordApiService $discordApiService
    )
    {
    }

    #[Route('/connect', name: 'connect', methods: ['POST'])]
    public function connect(Request $request): Response
    {
        $token = $request->request->get('token');

        if ($this->isCsrfTokenValid(DiscordAuthenticator::DISCORD_AUTH_KEY, $token)) {

            $request->getSession()->set(DiscordAuthenticator::DISCORD_AUTH_KEY, true);
            $scope = ['identify', 'email'];

            return $this->redirect($this->discordApiService->getAuthorizationUrl($scope));
        }

        return $this->redirectToRoute('accueil_index');
    }

    #[Route('/auth', name: 'auth')]
    public function auth(): Response
    {
        return $this->redirectToRoute('accueil_index');
    }

    #[Route('/check', name: 'check')]
    public function check(Request $request, EntityManagerInterface $em, UserRepository $userRepo): Response
    {
        $accessToken = $request->get('access_token');

        if (!$accessToken) {
            return $this->render('discord/check.html.twig', [
                'cssClass' => $this->cssClass
            ]);
        }

        $discordUser = $this->discordApiService->fetchUser($accessToken);
        
        $user = $userRepo->findOneBy(['discordId' => $discordUser->id]);

        if ($user) {
            return $this->redirectToRoute('oauth_discord_auth', [
                'accessToken' => $accessToken,
            ]);
        }

        $user = new User();

        $user->setUsername($discordUser->username);
        $user->setEmail($discordUser->email);
        $user->setDiscordId($discordUser->id);
        $user->setAvatar($discordUser->avatar);
        $user->setAccessToken($accessToken);

        $em->persist($user);
        $em->flush();

        return $this->redirectToRoute('oauth_discord_auth', [
            'accessToken' => $accessToken,
        ]);
    }
}