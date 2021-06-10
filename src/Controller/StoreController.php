<?php


namespace App\Controller;

use App\Manager\ProductManager;

use Symfony\Component\HttpFoundation\Request;

class StoreController
{
    /**
     * Page de la boutique
     *
     * @param Request $request
     * @param $template
     */
    public function index (Request $request, $template) {
        //include ROOT."/templates/store/index.html.twig";

        $ProduitManager = new ProductManager();
        $produits = $ProduitManager->findAll();
        echo $template->render('store/index.html.twig', ['produits'=>$produits]);

    }

    public function produit ($id, $template){
        $produit = new ProductManager();
        $produit = $produit->findOne($id);
        echo $template->render('store/produit.html.twig',["produit"=>$produit]);
    }

}