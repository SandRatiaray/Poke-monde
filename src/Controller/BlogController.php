<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

class BlogController
{
    /**
     * Page du blog
     * @param Request $request
     * @param $template
     */
    public function index (Request $request, $template) {
        //include ROOT."/templates/blog/index.html.twig";
        echo $template->render('blog/index.html.twig', []);
    }

}