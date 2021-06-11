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
// Contact
$routes->add("contact", new Route("/contact", ['_controller'=>[new ContactController(), "index"]]));
// Don
$routes->add("don", new Route("/don", ['_controller'=>[new DonationController(), "index"]]));
// Pokemon
$routes->add("pokemon", new Route("/pokemon", ['_controller'=>[new PokemonController(), "index"]]));
// Article
$routes->add("blog", new Route("/blog", ['_controller'=>[new BlogController(), "index"]]));
// Article Create
$routes->add("creerArticle", new Route("/creerArticle", ['_controller'=>[new BlogController(), "creerArticle"]]));
// Article Edit
$routes->add("modifierArticle", new Route("/modifierArticle", ['_controller'=>[new BlogController(), "modifierArticle"]]));


