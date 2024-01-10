<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route('/login',
     name: 'app_login',
     methods:["GET", "POST"]
     )]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(UserType::class);
        
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
            $user = new User();
            $user->setEmail($data["email"])
            ->setPassword($data["password"]);
            $em->persist($user);
            $em->flush();
            dd($user, $data);
        }
       

        return $this->render('login/index.html.twig', [
            'controller_name' => 'UserPageController',
            'form' => $form->createView(),
        ]);
    }
}
