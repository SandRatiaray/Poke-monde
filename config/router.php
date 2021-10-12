<?php

use App\Controller\AuthenticateController;
use App\Controller\ContactController;
use App\Controller\HomeController;
use App\Controller\AnimalController;
use App\Controller\UserController;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

/**
 * Liste des routes
 */
$routes = new RouteCollection();
// Acceuil
$routes->add("home", new Route("/", ['_controller'=>[new HomeController, "index"]]));

// Connexion
$routes->add("connexion", new Route("/connexion", ['_controller'=>[new AuthenticateController(), "signIn"]]));
// Deconnexion
$routes->add("deconnexion", new Route("/deconnexion", ['_controller'=>[new AuthenticateController(), "signOut"]]));

// Profil
$routes->add("profil", new Route("/profil", ['_controller'=>[new UserController(), "profil"]]));
// Éditer un utilisateur
$routes->add("editerUtilisateur", new Route("/editerUtilisateur", ['_controller'=>[new UserController(), "edit"]]));
// Supprimer un utilisateur
$routes->add("supprimerUtilisateur", new Route("/supprimerUtilisateur", ['_controller'=>[new UserController(), "delete"]]));

//animaux
$routes->add("animaux", new Route("/animaux", ['_controller'=>[new AnimalController(), "index"]]));
//animal par ID
$routes->add("animalShow", new Route("/animal", ['_controller'=>[new AnimalController(), "show"]]));

// inscription
$routes->add("inscription", new Route("/inscription", ['_controller'=>[new AuthenticateController, "signUp"]]));

//admin
$routes->add("admin", new Route("/admin", ['_controller'=>[new \App\Controller\AdminController(), "index"]]));
//edit user
$routes->add("admin_user_edit", new Route("/editUser", ['_controller'=>[new \App\Controller\AdminController(), "edit"]]));
//création de nouveaux animaux
$routes->add("animalNew", new Route("/animalNew", ['_controller'=>[new \App\Controller\AdminController(), "create"]]));
//édition des animaux
$routes->add("animalEdit", new Route("/animalEdit", ['_controller'=>[new \App\Controller\AdminController(), "edit"]]));
//Suppression animaux
$routes->add("deleteAnimal", new Route("/deleteAnimal", ['_controller'=>[new \App\Controller\AdminController(), "delete"]]));


