<?php

use App\Controller\HomeController;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Liste des routes
$routes = new RouteCollection();
$routes->add("/", new Route("/", ['_controller'=>[new HomeController, "index"]]));

