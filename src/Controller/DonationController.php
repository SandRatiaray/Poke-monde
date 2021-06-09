<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

class DonationController
{
    public function index (Request $request) {
        include ROOT."/templates/donation/index.html.twig";
    }

}