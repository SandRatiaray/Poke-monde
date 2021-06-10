<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

class AuthenticateController
{
    public function signIn (Request $request, $template) {
        //include ROOT."/templates/authenticate/sign_in.html.twig";
        echo $template->render('authenticate/sign_in.html.twig', []);
    }

    public function signUp (Request $request, $template) {
        //include ROOT."/templates/authenticate/sign_up.html.twig";
        echo $template->render('authenticate/sign_up.html.twig', []);
    }
}