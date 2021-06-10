<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

class HomeController
{
    /**
     * Page d'accueil
     * @param Request $request
     * @param $template
     */
    public function index (Request $request, $template) {
        echo $template->render('home/index.html.twig', []);
    }
}