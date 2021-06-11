<?php


namespace App\Controller;

use App\Manager\ProductManager;
use App\Entity\Product;
use App\Manager\ProductCategoryManager;
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

            $product->hydrate($request->request->all());
            var_dump($product);
            try{
                $manager->add($product);

                header('Location:/boutique');
                print_r("produit ajouté");
            }
            catch(Exception $e){
                print_r($e->getMessage());
            }
        }
        else{
            $categoriManager = new ProductCategoryManager();
            $categoriesProduits = $categoriManager->findAll();
            echo $template->render('store/add.html.twig', ["categoriesProduits"=>$categoriesProduits]);
        }
    }

    public function edit(Request $request, $template){

        if($request->isMethod('POST')){
            var_dump($request->request->all());
            $product = new Product();
            $manager = new ProductManager();

            $product->hydrate($request->request->all());
            try{
                $manager->edit($product);
                header('Location:/boutique');
            }
            catch(Exception $e){
                print_r("erreur lors de l'ajout de la mise à jour du produit");
            }
        }

        $categoriManager = new ProductCategoryManager();
        $categoriesProduits = $categoriManager->findAll();

        $id = $request->query->get("id");
        $manager = new ProductManager();
        $produit = $manager->findOne($id);
        echo $template->render('store/update.html.twig', ["produit"=>$produit, "categoriesProduits"=>$categoriesProduits]);

    }

    public function delete(Request $request, $template){
        if($request->isMethod('POST')){
            $product = new Product();
            $manager = new ProductManager();

            $product->hydrate($request->request->all());
            try{
                $manager->edit($product);
                header('Location:/boutique');
            }
            catch(Exception $e){
                print_r("erreur lors de l'ajout de la mise à jour du produit");
            }
        }
    }

}