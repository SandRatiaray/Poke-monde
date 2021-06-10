<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

class PokemonController
{
    public function index (Request $request, $template) {
        //include ROOT."/templates/pokemon/index.html.twig";
        echo $template->render('pokemon/index.html.twig', []);

    }
}