<?php

use App\Controller\AuthenticateController;
use App\Controller\BlogController;
use App\Controller\ContactController;
use App\Controller\DonationController;
use App\Controller\HomeController;
use App\Controller\PokemonController;
use App\Controller\StoreController;
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
// Inscription
$routes->add("inscription", new Route("/inscription", ['_controller'=>[new AuthenticateController, "signUp"]]));
// Boutique
$routes->add("boutique", new Route("/boutique", ['_controller'=>[new StoreController(), "index"]]));
$routes->add("produit_create", new Route("/produit", ['_controller'=>[new StoreController, "add"]]));
$routes->add("produit_edit", new Route("/produit/edit/{id}", ['_controller'=>[new StoreController, "edit"]]));
$routes->add("produit_update", new Route("/produit/update", ['_controller'=>[new StoreController, "update"]]));
// Contact
$routes->add("contact", new Route("/contact", ['_controller'=>[new ContactController(), "index"]]));
// Don
$routes->add("don", new Route("/don", ['_controller'=>[new DonationController(), "index"]]));
// Pokemon
$routes->add("pokemons", new Route("/pokemons", ['_controller'=>[new PokemonController(), "index"]]));
//créer nouveaux pokemons
$routes->add("pokemonNew", new Route("/pokemonNew", ['_controller'=>[new PokemonController(), "create"]]));
//édition des pokemons
$routes->add("pokemonEdit", new Route("/pokemonEdit/{id}", ['_controller'=>[new PokemonController(), "edit"]]));
//pokemon par ID
$routes->add("pokemonShow", new Route("/pokemon/{nameSlug}", ['_controller'=>[new PokemonController(), "show"]]));
//Delete pokemon
$routes->add("pokemonDelete", new Route("/delete/{nameSlug}", ['_controller'=>[new PokemonController(), "delete"]]));

// Blog
$routes->add("blog", new Route("/blog", ['_controller'=>[new BlogController(), "index"]]));

