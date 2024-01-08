<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SettingHallController extends AbstractController
{
    #[Route(
        "/setting_hall/{id}", 
        name: "setting_hall", 
        methods:["GET"],
        requirements:["id"=>"\d+"]
    )]

    public function hello()
    {
        return $this->render
        (
            "setting_hall.html.twig"
        );
    }
}
