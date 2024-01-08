<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MusicPageController extends AbstractController
{
    #[Route(
        "/music_page/{id}", 
        name: "music_page", 
        methods:["GET"],
        requirements:["id"=>"\d+"]
    )]

    public function hello()
    {
        return $this->render
        (
            "music_page.html.twig"
        );
    }
}
