<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HallPageController extends AbstractController
{
    #[Route(
        "/hall_page/{id}", 
        name: "hall_page", 
        methods:["GET"],
        requirements:["id"=>"\d+"]
    )]

    public function hello()
    {
        return $this->render
        (
            "hall_page.html.twig"
        );
    }
}
