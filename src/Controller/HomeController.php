<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

class HomeController
{
    public function index (Request $request) {
        include ROOT."/templates/home/index.php";
    }
}