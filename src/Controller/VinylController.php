<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController{

    #[Route("/")]
    public function homepage(){

        $tracks = [
            ['song' => 'Gangsta\'s Paradise', 'artist' => 'Coolio'],
            ['song' => 'Waterfalls', 'artist' => 'TLC'],
            ['song' => 'Creep', 'artist' => 'Radiohead'],
            ['song' => 'Kiss from a Rose', 'artist' => 'Seal'],
            ['song' => 'On Bended Knee', 'artist' => 'Boyz II Men'],
            ['song' => 'Fantasy', 'artist' => 'Mariah Carey'],
        ];

        return $this->render("vinyl/homepage.html.twig", [
            'title' => 'PB & Jams',
            "tracks" => $tracks
        ]);
    }

    #[Route("/browse/{genre}")]
    public function browse($genre = null){
        if($genre){
            $title = "Genre: ".u(str_replace("-", " ", $genre))->title(true);
        }else{
            $title = "All Genres";
        }
        

        return new Response($title);
    }
}
