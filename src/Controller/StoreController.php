<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

class StoreController
{
    public function index (Request $request) {
        include ROOT."/templates/store/index.php";
    }

}