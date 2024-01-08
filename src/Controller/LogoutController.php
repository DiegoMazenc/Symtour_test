<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LogoutController extends AbstractController
{
    #[Route(
        "/logout/{id}", 
        name: "logout", 
        methods:["GET"],
        requirements:["id"=>"\d+"]
    )]

    public function hello()
    {
        return $this->render
        (
            "logout.html.twig"
        );
    }
}
