<?php


namespace App\Controller;

use App\Entity\Contact;
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

        if ($request->isMethod('POST')) {
            $contact = new Contact();
            $manager = new ContactManager();
            $contact->hydrate((array)$request->request->all());
            $manager->add($contact);
            header("location:/");
        }



        //include ROOT."/templates/contact/index.html.twig";
        echo $template->render('contact/index.html.twig', []);
    }
}
