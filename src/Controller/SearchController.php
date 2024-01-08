<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route(
        "/search", 
        name: "search", 
        methods:["GET"]
    )]

    public function hello()
    {
        return $this->render
        (
            "search.html.twig"
        );
    }
}
