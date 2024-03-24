<?php

namespace App\Controller;

use App\Entity\Ville;
use App\Form\VilleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VilleController extends AbstractController
{
    #[Route('/ville', name: 'app_ville')]
    public function index(): Response
    {
        return $this->render('ville/index.html.twig', [
            'controller_name' => 'VilleController',
        ]);
    }

    #[Route('add_ville', name:'ajouter_ville')]
    public function addVille(Request $request, EntityManagerInterface $em):Response
    {
        $ville = new Ville();

        $form = $this->createForm(VilleType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
                $name = $form->get('name')->getData();
                $temperature = $form->get('temperature')->getData();
                $temps = $form->get('temps')->getData();

                $ville->setName($name);
                $ville->setTemperature($temperature);
                $ville->setTemps($temps);
// dd($ville);
                $em->persist($ville);

                $em->flush();

                return $this->redirectToRoute('app_home');
         }

        return $this->render('ville/ajouter_ville.html.twig', [
            'ville' => $form->createView(),
            
        ]);
    }
}
