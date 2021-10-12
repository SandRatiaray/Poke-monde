<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Entity\Contact;
use App\Entity\User;
use App\Manager\AnimalManager;
use App\Manager\ContactManager;
use Symfony\Component\HttpFoundation\Request;

class AnimalController
{

    /**
     * Page de la liste des pokemons
     * @param Request $request
     * @param $template
     */
    public function index (Request $request, $template) {
        // on appelle le PokemonManager
        $manager = new AnimalManager();
        // on utilise la requete findAll() du manager
        $animals = $manager->findAll();
        echo $template->render('animal/index.html.twig', [
            'animals' => $animals
        ]);

    }

    /**
     * Page de la liste des pokemons
     * @param Request $request
     * @param $template
     */
    public function show (Request $request, $template) {
        $id =$request->query->get('id');
        if ($id){
            $manager = new AnimalManager();
            $animal = $manager->findOne($id);
        }

        if ($request->isMethod('POST')) {
            $contact = new Contact();
            $manager = new ContactManager();
            $contact->setCreatedAt(new \DateTime('now'));

            $manager->add($contact);
            // On créer un message dans la session
            $_SESSION['contact_ok'] = "Votre message a bien été reçu!";

            //On redirige vers la page de contact
            header("location:/");
        }

        echo $template->render('animal/show.html.twig', [
            'animal' => $animal
        ]);

    }


}