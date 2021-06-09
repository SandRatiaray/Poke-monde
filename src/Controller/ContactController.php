<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

class ContactController
{
    public function index (Request $request) {
        include ROOT."/templates/contact/index.php";
    }

}