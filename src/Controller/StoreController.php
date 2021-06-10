<?php


namespace App\Controller;

use App\Manager\ProductManager;
use App\Entity\Product;
use Exception;
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

    public function add (Request $request, $template){
        if($request->isMethod('POST')){
            $product = new Product();
            $manager = new ProductManager();

            $product->hydrate((array)$request->request->all());
            try{
                $manager->add($product);
                header('Location:/boutique');
            }
            catch(Exception $e){
                print_r("erreur lors de l'ajout du produit");
            }
        }
    }

    public function update(Request $request, $template){
        if($request->isMethod('POST')){
            $product = new Product();
            $manager = new ProductManager();

            $product->hydrate((array)$request->request->all());
            try{
                $manager->edit($product);
                header('Location:/boutique');
            }
            catch(Exception $e){
                print_r("erreur lors de l'ajout de la mise à jour du produit");
            }
        }
    }

    public function delete($id, $template){
        $manager = new ProductManager();
        $manager->delete($id);
    }

}