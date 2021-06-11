<?php


namespace App\Controller;

use App\Entity\Article;
use App\Manager\ArticleManager;
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


    public function modifierArticle (Request $request, $template) {
        //include ROOT."/templates/blog/edit.html.twig";
        echo $template->render('blog/edit.html.twig', []);
    }

    public function creerArticle(Request $request, $template){
        {

            if ($request->isMethod('POST')) {
                $article = new Article();
                $manager = new ArticleManager();

                $datas = $request->request->all();

                $article->setTitle($datas['title']);
                $article->setContent($datas['content']);
                $article->setCreatedAt($datas['createdAt']);
                var_dump($article);
                $manager->add($article);
                var_dump($manager);
                header("location:/blog");
            }


            echo $template->render('blog/new.html.twig', []);
        }

    }

    public function editArticle(Request $request, $template){
        if($request->isMethod('POST')){
            $article = new Article();
            $manager = new ArticleManager();

            $article->hydrate((array)$request->request->all());
            try{
                $manager->edit($article);
                header('Location:/article');
            }
            catch(Exception $e){
                print_r("Erreur");
            }
        }
    }



}