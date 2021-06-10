<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

class StoreController
{
    public function index (Request $request, $template) {
        //include ROOT."/templates/store/index.html.twig";
        echo $template->render('store/index.html.twig', []);

    }

}