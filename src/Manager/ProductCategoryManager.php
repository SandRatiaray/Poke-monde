<?php
namespace App\Manager;
use App\Manager\ManagerInterface;

class ProductCategoryManager implements ManagerInterface
{

    public function add($entity)
    {
        $statement = "INSERT INTO user (name, nameSlug) 
                        VALUES (:name, :nameSlug)";

        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":name", $entity->getName());
        $prepare->bindValue(":nameSlug", $entity->getNameSlug());
        $prepare->execute();
    }

    public function edit($entity)
    {
        $statement = "UPDATE productcategory SET 
                name = :name,
                nameSlug = :nameSlug,";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":name", $entity->getName());
        $prepare->bindValue(":nameSlug", $entity->getNameSlug());
        $prepare->execute();
    }

    public function delete(int $id,$entity)
    {
        $statement = "DELETE FROM productcategory WHERE id = :id";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute();
    }

    public function findOne($entity)
    {
        $statement = "SELECT * FROM productcategory WHERE id = :id LIMIT 1";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":name", $entity->getName());
        $prepare->execute();
        return $prepare->fetch(\PDO::FETCH_CLASS, productcategory::class);
    }

    public function findFirst()
    {
        $query = $this->db->query( "SELECT * FROM productcategory ORDER BY id = :id ASC LIMIT 1");
        return $query->fetch(\PDO::FETCH_CLASS, productcategory::class);
    }

    public function findAll()
    {
        $query = $this->db->query("SELECT * FROM productcategory");
        return $query->fetchAll(\PDO::FETCH_CLASS, productcategory::class);
    }
}