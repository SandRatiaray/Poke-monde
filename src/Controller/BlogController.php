<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

class BlogController
{
    public function index (Request $request) {
        include ROOT."/templates/blog/index.html.twig";
    }

}