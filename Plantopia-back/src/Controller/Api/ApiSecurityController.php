<?php

namespace App\Controller\Api;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * @Route("/api", name="api_")
 */
class ApiSecurityController extends AbstractController
{
    /**
     * @Route("/login", name="login", methods={"GET"})
     */
    public function login(Request $request): Response
    {
        $user = $this->getUser();
        return $this->json($user);
    }

    /**
     * @Route("/logout", name="app_logout", methods={"GET","POST"})
     */
    public function logout(): Response
    {
        return $this->redirectToRoute('plant_index');
        
    }
}
