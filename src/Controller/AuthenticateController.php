<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

class AuthenticateController
{
    public function signIn (Request $request) {
        include ROOT."/templates/authenticate/sign_in.php";
    }

    public function signUp (Request $request) {
        include ROOT."/templates/authenticate/sign_up.php";
    }
}