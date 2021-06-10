<?php
namespace App\Entity;

class Product
{

    /**
     * @var string
     * représente le nom du produi
     */
    private $name;

    /**
     * @var string 
     * repésente le slug du produit
     */
    private $nameSlug;

    /**
     * @var int
     * représente la quntité du produit
     */
    private $stock;

    /**
     * @var int 
     * représente la catégorie du produit
     */
    private $category;

    /**
     * @var float
     * représente le prix unitaire du produit
     */
    private $price;

    /**
     * @var string
     * représente la description du produit
     */
    private $description;

    /**
     * @var string
     * représente la chaine de l'image d'un produit
     */
    private $image;



    /**
     * @var id
     * représente l'id du produit
     */
    private $id;

    /**
     * @return mixed
     * renvoi l'id du produit
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     * retourne le nom du produit 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * ajoute le nom du produit
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     * retourne le slug du produit
     */
    public function getNameSlug()
    {
        return $this->nameSlug;
    }

    /**
     * @param mixed $nameSlug
     * ajoute le slug du produit
     */
    public function setNameSlug($nameSlug)
    {
        $this->nameSlug = $nameSlug;
    }

    /**
     * @return mixed
     * retourne le stock du produit
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     * ajoute le stock du produit 
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    /**
     * @return mixed
     * retorune la catégorie du profuit 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     * ajoute la catégorie du produit
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     * retourne le prix du produit
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     * ajoute le prix du produit
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     * retourne la description du produit
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * ajoute la description du produit 
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get représente la chaine de l'image d'un produit
     *
     * @return  string
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set représente la chaine de l'image d'un produit
     *
     * @param  string  $image  représente la chaine de l'image d'un produit
     *
     */ 
    public function setImage(string $image)
    {
        $this->image = $image;
    }

    
    /**
     * Hydrate
     * @param array $product
     * permet d'hydrater les données
     */
    public function hydrate(array $product)
    {
        foreach ($product as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


}

