<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route(
        '/login',
        name: 'app_login',
        methods: ["GET", "POST"]
    )]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(UserType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $user = new User();
            $user
                ->setEmail($data["email"])
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

    #[Route(
        '/login/{id}',
        name: 'login_detail',
        requirements: ["id" => "\d+"]
    )]

    public function read($id, UserRepository $ur): Response
    {
        $user = $ur->find((int)$id);
        return $this->render("login/read.html.twig", [
            "user" => $user
        ]);
    }

    #[Route(
        '/login/{id}/edit',
        name: 'login_edit',
        methods: ["GET", "POST"],
        requirements: ["id" => "\d+"]
    )]

    public function edit(
        Request $request,
        $id,
        UserRepository $ur,
        EntityManagerInterface $em
    ): Response {
        $user = $ur->find((int)$id);
        $form = $this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $em->flush();
        }

        return $this->render("login/edit.html.twig", [
            "form" => $form->createView()
        ]);
    }

    
    #[Route(
        '/login/{id}/delete',
        name: 'login_delete',
        methods: ["GET"],
        requirements: ["id" => "\d+"]
    )]

    public function delete(
        Request $request,
        UserRepository $ur,
        EntityManagerInterface $em,
        $id)
    {
        $user = $ur->find((int)$id);
        if($request->query->get('method')=== 'DELETE'){
           
            $em->remove($user);
            $em->flush();
            return $this->redirectToRoute("app_register");
        }
        return $this->render("login/read.html.twig", [
            "user" => $user
        ]);
    
    }

}
