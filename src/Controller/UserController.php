<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route(
        "/user/{id}", 
        name: "user", 
        methods:["GET"],
        requirements:["id"=>"\d+"]
    )]

    public function hello()
    {
        return $this->render
        (
            "user.html.twig"
        );
    }
}
