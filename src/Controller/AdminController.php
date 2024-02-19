<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserRolesType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    #[IsGranted('ROLE_ADMIN')]
    public function index(UserRepository $userRepository): Response
    {   
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'users'=>$userRepository->findAll(),
            'appUser'=>$this->getUser()
        ]);
    }
    #[Route('/admin/edit/{id}', name: 'app_admin_edit')]
    #[IsGranted('ROLE_SUPER_ADMIN')]
    public function edit(User $user, EntityManagerInterface $entityManager, Request $request): Response
    {   

        $form = $this->createForm(UserRolesType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->flush();

            return $this->redirectToRoute('app_admin',[], Response::HTTP_SEE_OTHER);
        }
        
        return $this->render('admin/edit.html.twig', [
            'controller_name' => 'AdminController',
            'user'=>$user,
            'appUser'=>$this->getUser(),
            'form'=>$form
        ]);
    }
}
