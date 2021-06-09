<?php
namespace App\Entity;

class ProductCategory
{
    /**
     * @var int 
     * représente l'id 
     */
    private $id;

    /**
     * @var String
     */
    private $nameSlug;

    /**
     * @var String
     * représente le nom de la catégorie
     */
    private $name;

    /**
     * @return mixed
     * retourne l'id de la catégorie
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     * retourne le nom de la catégorie
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * ajoute le nom de la catégorie
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     * retourne le slig de la catégorie
     */
    public function getNameSlug()
    {
        return $this->nameSlug;
    }

    /**
     * @param mixed $nameSlug
     * ajoute le slug de la catégorie
     */
    public function setNameSlug($nameSlug)
    {
        $this->nameSlug = $nameSlug;
    }

    /**
     * @param array $product
     * Hydrate les données de la base de données
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

