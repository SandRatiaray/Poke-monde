<?php


namespace App\Controller;

use App\Entity\Contact;
use App\Entity\User;
use App\Manager\ContactManager;
use Symfony\Component\HttpFoundation\Request;

class ContactController
{
    /**
     * Page de contact
     * @param Request $request
     * @param $template
     */
    public function index(Request $request, $template)
    {
        // Si le formulaire est soumis
        if ($request->isMethod('POST')) {
            $contact = new Contact();
            $manager = new ContactManager();
            $user = new User();
            $user->setId($_SESSION['user']['id']);
            $user->setEmail($_SESSION['user']['email']);
            $user->setPassword($_SESSION['user']['password']);
            $contact->hydrate((array)$request->request->all());
            $contact->setUser($user->getId());
            $manager->add($contact);

            // On créer un message dans la session
            $_SESSION['contact_ok'] = "Votre message a bien été reçu!";

            //On redirige vers la page de contact
            header("location:/contact");
        }

        // Rendu de la page contact
        echo $template->render('contact/index.html.twig', []);
    }
}
