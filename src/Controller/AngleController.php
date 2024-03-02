<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class AngleController extends AbstractController
{
    #[Route('/angle', name: 'app_angle')]
    public function index(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('a', NumberType::class, ['data' => $request->getSession()->get('a')])
            ->add('b', NumberType::class, ['data' => $request->getSession()->get('b')])
            ->add('c', NumberType::class, ['data' => $request->getSession()->get('c')])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $a = $data['a'];
            $b = $data['b'];
            $c = $data['c'];
            $angle = acos(($a*$a + $b*$b - $c*$c) / (2*$a*$b)) * 180 / pi();
            $angle = round($angle, 2);

            $request->getSession()->set('a', $a);
            $request->getSession()->set('b', $b);
            $request->getSession()->set('c', $c);
            $request->getSession()->set('angle', $angle);

            return $this->redirectToRoute('app_angle');
        }

        $angle = $request->getSession()->get('angle');

        return $this->render('angle/index.html.twig', [
            'form' => $form->createView(),
            'angle' => $angle,
        ]);
    }
}