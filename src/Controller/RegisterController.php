<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    #[Route('/register', 
    name: 'app_register',
    methods:["GET","POST"]
    )]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(RegisterType::class);
        
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
            $user = new user();
            $user
            ->setFirstname($data["firstname"])
            ->setLastname($data["lastname"])
            ->setPseudo($data["pseudo"])
            ->setEmail($data["email"])
            ->setPassword($data["password"]);
            $em->persist($user);
            $em->flush();
            dd($user, $data);
        }
        return $this->render('register/index.html.twig', [
            'controller_name' => 'RegisterController',
            'form' => $form->createView()
        ]);
    }
}
