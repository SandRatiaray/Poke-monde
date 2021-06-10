<?php
namespace App\Manager;
use App\Entity\Product;
use App\Manager\ManagerInterface;
use Vendor\database\Database;

class ProductManager implements ManagerInterface
{
    /**
     *
     * @param Product $entity
     * @return mixed
     * ajoute un produit dans la base de données 
     */
    public function add($entity)
    {
        $statement = "INSERT INTO user (name, nameSlug, stock, category, price, description) 
                        VALUES (:name, :nameSlug, :stock, :category, :price, :description)";

        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":name", $entity->getName());
        $prepare->bindValue(":nameSlug", $entity->getNameSlug());
        $prepare->bindValue(":stock", $entity->getStock());
        $prepare->bindValue(":category", $entity->getCategory());
        $prepare->bindValue(":price", $entity->getPrice());
        $prepare->bindValue(":description", $entity->getDescription());
        $prepare->execute();
    }

    /**
     * @var entity
     * @return mixed
     * modifie un produit dans la base de données 
     */
    public function edit($entity)
    {
        $statement = "UPDATE product SET 
                name = :name,
                nameSlug = :nameSlug,
                stock = :stock,
                category = :category,
                price = :price,
                description = :description";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":name", $entity->getName());
        $prepare->bindValue(":nameSlug", $entity->getNameSlug());
        $prepare->bindValue(":stock", $entity->getStock());
        $prepare->bindValue(":category", $entity->getCategory());
        $prepare->bindValue(":price", $entity->getPrice());
        $prepare->bindValue(":description", $entity->getDescription());
        $prepare->execute();
    }

    /**
     * @var entity
     * @return mixed
     * supprime un produit grâce à son id
     */
    public function delete($entity)
    {
        $statement = "DELETE FROM product WHERE id = :id";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute();
    }


    /**
     * @var entity
     * @return mixed|product 
     * retourne un produit en fonction de son id
     */
    public function findOne($entity)
    {
        $statement = "SELECT * FROM product WHERE id = :id LIMIT 1";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":name", $entity->getName());
        $prepare->execute();
        return $prepare->fetch(\PDO::FETCH_CLASS, product::class);
    }

    /**
     * @var null 
     * @return mixed|product
     * retourne le premier produit de en enfonction de la recherche 
     */
    public function findFirst()
    {
        // TODO: Implement findFirst() method.
        $query = $this->db->query( "SELECT * FROM product ORDER BY id = :id ASC LIMIT 1");
        return $query->fetch(\PDO::FETCH_CLASS, product::class);
    }

    /**
     * @var null
     * @return array|product
     * retourne la totalité des produits
     */
    public function findAll()
    {
        $query = $this->db->query("SELECT * FROM product");
        return $query->fetchAll(\PDO::FETCH_CLASS, product::class);
    }
}