<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MeteoVilleController extends AbstractController
{
    // #[Route('/meteo/ville', name: 'app_meteo_ville')]
    // public function index(): Response
    // {
    //     return $this->render('meteo_ville/index.html.twig', [
    //         'controller_name' => 'MeteoVilleController',
    //     ]);
    // }

    #[Route('/api/meteo', name:'meteo_ville', methods: ['GET'])]
    public function meteoVilleData(): Response
    {
        $meteoData = [
            'temperature' => 22,
            'temps' => 'Soleil',
            'ville' => 'Paris'
        ];
        return $this->json($meteoData);
    }
}
