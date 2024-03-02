<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_angle');
        }
        return $this->render('home/index.html.twig');
    }

    #[Route('/calcul', name: 'app_home_calcul')]
    #[IsGranted('ROLE_USER')]
    public function private(): Response
    {
        return $this->render('home/calcul.html.twig');
    }
}
