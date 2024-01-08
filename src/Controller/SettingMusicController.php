<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SettingMusicController extends AbstractController
{
    #[Route(
        "/setting_music/{id}", 
        name: "setting_music", 
        methods:["GET"],
        requirements:["id"=>"\d+"]
    )]

    public function hello()
    {
        return $this->render
        (
            "setting_music.html.twig"
        );
    }
}
