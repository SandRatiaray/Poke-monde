<?php
namespace App\Controller;

use App\Manager\PokemonManager;
use App\Manager\PokemonTypeManager;
use App\Manager\PokemonRaceManager;
use App\Manager\PokemonRarityManager;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Pokemon;
use Vendor\database\Manager;

class PokemonController
{
    /**
     * Page de la liste des pokemons
     * @param Request $request
     * @param $template
     */
    public function index (Request $request, $template) {
        // on appelle le PokemonManager
        $manager = new PokemonManager();
        // on utilise la requete findAll() du manager
        $pokemons = $manager->findAll();
        echo $template->render('pokemon/index.html.twig', [
            'pokemons' => $pokemons
        ]);

    }

    public function create(Request $request, $template){
        {
                // si le formulaire est soumis
            if ($request->isMethod('POST')) {
                // on crée un nouveau pokemon
                $pokemon = new Pokemon();
                $manager = new PokemonManager();
                $pokemon->hydrate($request->request->all());
                $manager->add($pokemon);
                //header("Location:/pokemon/". $pokemon->getId()."");
            }
            $managerType = new PokemonTypeManager();
            $managerRace = new PokemonRaceManager();
            $managerRarity = new PokemonRarityManager();
            $types = $managerType->findAll();
            $races = $managerRace->findAll();
            $raritys = $managerRarity->findAll();


            echo $template->render('pokemon/create.html.twig', [
                'types' => $types,
                'races' => $races,
                'raritys' => $raritys
            ]);
        }
    }

    /**
     * Page de la liste des pokemons
     * @param Request $request
     * @param $template
     */
    public function show (Request $request, $template) {
        $id =$request->query->get('id');
    if ($id){
        $manager = new PokemonManager();
        $pokemon = $manager->findOne($id);
    }
        echo $template->render('pokemon/show.html.twig', [
            'pokemon' => $pokemon
        ]);

    }

    public function delete(Request $request, $template){
        $id =$request->query->get('id');
        print_r($id);
        die;
        if ($id){
            $manager = new PokemonManager();
            $pokemon = $manager->delete($id);
            header("Location:/pokemons");
        }

    }
}