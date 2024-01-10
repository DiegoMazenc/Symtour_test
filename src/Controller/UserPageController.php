<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserPageController extends AbstractController
{
    #[Route('/user/page', name: 'app_user_page')]
    public function index(): Response
    {
        $form = $this->createFormBuilder()
        ->add('email', EmailType::class)
        ->add('password', PasswordType::class)
        ->add('submit', SubmitType::class)
        ->getForm();

        return $this->render('user_page/index.html.twig', [
            'controller_name' => 'UserPageController',
            'form' => $form->createView(),
        ]);
    }
}
