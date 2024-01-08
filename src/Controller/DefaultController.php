<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route(
        "/article/{id}", 
        name: "detail_article", 
        methods:["GET"], 
        requirements:["id"=>"\d+"]
    )]

    public function hello($id)
    {
        return $this->render
        (
            "example.html.twig",
            [
                'articles' => [
                    "titre1" => "Titre1",
                    "titre2" => "Titre2",
                    "titre3" => "Titre3"
                ]
            ]
        );
    }
}
