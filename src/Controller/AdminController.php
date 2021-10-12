<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Manager\AnimalManager;
use App\Manager\UserManager;
use Symfony\Component\HttpFoundation\Request;

class AdminController
{
    public function index(Request $request, $template){

        $manager = new UserManager();
        // on utilise la requete findAll() du manager
        $users = $manager->findAll();

        $manager = new AnimalManager();
        // on utilise la requete findAll() du manager
        $animals = $manager->findAllAnimals();

        echo $template->render('admin/index.html.twig', [
            'animals' => $animals,
            'users' => $users
        ]);
    }

    public function create(Request $request, $template){
        {
            // si le formulaire est soumis
            if ($request->isMethod('POST')) {
                // on crée un nouveau animal
                $animal = new Animal();
                $manager = new AnimalManager();
                $animal?->hydrate($request->request->all());
                $manager?->add($animal);
                header("Location:/admin");
            }

            echo $template->render('animal/create.html.twig', [

            ]);
        }
    }


    public function edit(Request $request, $template) {
        $id = $request->query->get('id');
        if($id){
            $userManager = new UserManager();
            $user = $userManager?->findOneById($id);

            if ($request->isMethod('POST')) {
                $manager = new UserManager();
                $user?->hydrate($request->request->all());
                $manager?->edit($user);

                // Message de création
                $_SESSION['modification_ok'] = "Votre compte à été modifié avec succès !";

                // Modification de la variable user dans la session
                $_SESSION['user'] = [
                    'id' => $user->getId(),
                    'lastname' => $user->getLastName(),
                    'firstname' => $user->getFirstName(),
                    'email' => $user->getEmail(),
                    'password' => $user->getPassword(),
                    'tel' => $user->getTel(),
                    'address' => $user->getAddress(),
                    'zipcode' => $user->getZipCode(),
                     'roles' => $user->getRoles()
                ];
                // Redirection vers la page de profil
                header("Location:/admin");
            }

            //Rendu de la page d'édition de profil
            echo $template->render('admin/editUser.html.twig', [
                'user' => $user
            ]);
        }else{
            // Si l'utilisateur n'existe pas on redirige vers la page de connexion
            header("Location:/connexion");
        }
    }

    /**
     * Supprimer un compte
     *
     * @param Request $request
     * @param $template
     */
    public function delete(Request $request, $template) {
        $id = $request->query->get('id');
        if($id){
            $userManager = new UserManager();
            $user = $userManager?->findOneById($id);
            $userManager?->delete($user);

            // Supprimer la variable user de la session
            unset($_SESSION['user']);

            // Message de création
            $_SESSION['Suppression_ok'] = "Votre compte à été supprimé avec succès !";

            // Redirection vers la page de profil
            header("Location:/inscription");
        }

        // Rendu de la page de profil
        echo $template->render('user/profil.html.twig', []);
    }
}