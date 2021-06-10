<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

class ContactController
{
    /**
     * Page de contact
     * @param Request $request
     * @param $template
     */
    public function index (Request $request, $template) {
        //include ROOT."/templates/contact/index.html.twig";
        echo $template->render('contact/index.html.twig', []);

    }

}