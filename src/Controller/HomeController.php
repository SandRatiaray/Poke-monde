<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

class HomeController
{
    public function index (Request $request, $template) {
        echo $template->render('home/index.html.twig', []);
    }
}