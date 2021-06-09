<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

class PokemonController
{
    public function index (Request $request) {
        include ROOT."/templates/pokemon/index.php";
    }
}