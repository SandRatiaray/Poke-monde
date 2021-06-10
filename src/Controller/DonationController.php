<?php


namespace App\Controller;

use App\Entity\Don;
use App\Manager\DonManager;
use Symfony\Component\HttpFoundation\Request;

class DonationController
{
    /**
     * Page de don
     * @param Request $request
     * @param $template
     */
    public function index(Request $request, $template)
    {

        if ($request->isMethod('POST')) {
            $don = new Don();
            $manager = new DonManager();
            print_r($request->request->all());
            $don->hydrate((array)$request->request->all());
            $manager->add($don);
            header("location:/");
        }



        //include ROOT."/templates/donation/index.html.twig";
        echo $template->render('donation/index.html.twig', []);
    }
}
