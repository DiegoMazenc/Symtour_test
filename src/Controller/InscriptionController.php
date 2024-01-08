<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionController extends AbstractController
{
    #[Route(
        "/inscription", 
        name: "inscription", 
        methods:["GET"]
    )]

    public function hello()
    {
        return $this->render
        (
            "inscription.html.twig"
        );
    }
}
