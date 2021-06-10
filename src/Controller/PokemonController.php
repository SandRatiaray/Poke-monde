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
        $manager = new PokemonManager();
        $pokemons = $manager->findAll();
        echo $template->render('pokemon/index.html.twig', [
            'pokemons' => $pokemons
        ]);

    }

    public function create(Request $request, $template){
        {
            if ($request->isMethod('POST')) {
                $pokemon = new Pokemon();
                $manager = new PokemonManager();
                $datas = $request->request->all();
/*                var_dump($datas);*/
                $pokemon->setType($datas['type']);
                $pokemon->setRace($datas['race']);
                $pokemon->setRarity($datas['rarity']);
                var_dump($pokemon);
                $manager->add($pokemon);
                var_dump($manager);
                header("Location:/");
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

    public function edit(Request $request, $template){
        if($request->isMethod('POST')){
            $product = new Product();
            $manager = new ProductManager();

            $product->hydrate((array)$request->request->all());
            try{
                $manager->edit($product);
                header('Location:/boutique');
            }
            catch(Exception $e){
                print_r("erreur lors de l'ajout de la mise à jour du produit");
            }
        }
    }

    public function delete($id){
        $manager = new PokemonManager();
        $manager->delete($id);
    }
}