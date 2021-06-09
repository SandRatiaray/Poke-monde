<?php
namespace App\Manager;
use App\Entity\Product;
use App\Manager\ManagerInterface;
use Vendor\database\Database;

class ProductManager implements ManagerInterface
{

    private \PDO $db;

    public function __construct ()
    {
        $db = new Database();
        $this->setDb($db->getDb());
    }

    private function setDb (\PDO $db)
    {
        $this->db = $db;
    }

    /**
     *
     * @param Product $entity
     * @return mixed
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

    public function delete(int $id, $entity)
    {
        $statement = "DELETE FROM product WHERE id = :id";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute();
    }


    public function findOne($entity)
    {
        $statement = "SELECT * FROM product WHERE id = :id LIMIT 1";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":name", $entity->getName());
        $prepare->execute();
        return $prepare->fetch(\PDO::FETCH_CLASS, product::class);
    }

    public function findFirst()
    {
        // TODO: Implement findFirst() method.
        $query = $this->db->query( "SELECT * FROM product ORDER BY id = :id ASC LIMIT 1");
        return $query->fetch(\PDO::FETCH_CLASS, product::class);
    }

    public function findAll()
    {
        $query = $this->db->query("SELECT * FROM product");
        return $query->fetchAll(\PDO::FETCH_CLASS, product::class);
    }
}