<?php


namespace App\Controller;

use App\Entity\Don;
use App\Entity\User;
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
        // Si le formulaire est soumis
        if ($request->isMethod('POST')) {
            $don = new Don();
            $donManager = new DonManager();
            $user = new User();
            $user->setId($_SESSION['user']['id']);
            $user->setEmail($_SESSION['user']['email']);
            $user->setPassword($_SESSION['user']['password']);
            $don->hydrate($request->request->all());
            $don->setUser($user);
            $donManager->add($don);

            // On créer un message dans la session
            $_SESSION['don_ok'] = "Votre don a bien été reçu! Merci !";

            //On redirige vers la page de don
            header("location:/don");
        }

        // Rendu de la page donation
        echo $template->render('donation/index.html.twig', []);
    }
}
