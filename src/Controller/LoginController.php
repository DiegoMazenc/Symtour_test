<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route(
        "/login", 
        name: "login", 
        methods:["GET"]
    )]

    public function hello()
    {
        return $this->render
        (
            "login.html.twig"
        );
    }
}
