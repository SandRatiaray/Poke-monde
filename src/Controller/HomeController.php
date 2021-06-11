<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Manager\PokemonManager;
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
        $manager = new PokemonManager();
        $pokemons = $manager->findAll();
        echo $template->render('home/index.html.twig', [
            'pokemons' => $pokemons
        ]);
    }
}
