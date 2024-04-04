<?php

namespace App\Controller;

use App\Repository\VilleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MeteoVilleController extends AbstractController
{
   

    #[Route('/api/meteo', name:'meteo_ville', methods: ['GET'])]
    public function meteoVilleData(Request $request, VilleRepository $villeRepository): Response
    {
        $nomVille = $request->query->get('ville', 'DefaultCity');

        $villeData = $villeRepository->findByNom($nomVille);
        if(!$villeData){
               return new JsonResponse(["error" => "La ville n'existe pas dans la base de donnée."], 404);
        }
        // dd($villeData);

        $villeTemperature = $villeData->getTemperature();
        $villeTemps = $villeData->getTemps();
        // dd($villeTemperature, $villeTemps);
        $meteoData = [
            'temperature' => $villeTemperature,
            'temps' => $villeTemps,
            // 'ville' => 'Paris'
        ];
        // dd($meteoData);
        return new JsonResponse($meteoData);
    }
}
