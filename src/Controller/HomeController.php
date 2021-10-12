<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Manager\AnimalManager;
use Symfony\Component\HttpFoundation\Request;

class HomeController
{
    /**
     * Page d'accueil
     * @param Request $request
     * @param $template
     */
    public function index(Request $request, $template)
    {
        $manager = new AnimalManager();
        $animaux = $manager->findLastTenPets();
        echo $template->render('home/index.html.twig', [
            'animaux' => $animaux
        ]);
    }
}
