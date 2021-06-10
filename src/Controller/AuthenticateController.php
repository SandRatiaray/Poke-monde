<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

class AuthenticateController
{
    /**
     * Page de connexion
     * @param Request $request
     * @param $template
     */
    public function signIn (Request $request, $template) {
        //include ROOT."/templates/authenticate/sign_in.html.twig";
        echo $template->render('authenticate/sign_in.html.twig', []);
    }

    /**
     * Page d'inscription
     * @param Request $request
     * @param $template
     */
    public function signUp (Request $request, $template) {
        //include ROOT."/templates/authenticate/sign_up.html.twig";
        echo $template->render('authenticate/sign_up.html.twig', []);
    }
}