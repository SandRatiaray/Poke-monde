<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

class DonationController
{
    /**
     * Page de don
     * @param Request $request
     * @param $template
     */
    public function index (Request $request, $template) {
        //include ROOT."/templates/donation/index.html.twig";
        echo $template->render('donation/index.html.twig', []);

    }

}