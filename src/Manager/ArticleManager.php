<?php

namespace App\Manager;

use App\Manager\ManagerInterface;

class ArticlesManager implements ManagerInterface
{

    public function findOne($entity)
    {
        $stmt = "SELECT * FROM article WHERE id = :id LIMIT 1";
        $prepare = $this->db->prepare($stmt);
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute;
    }

    public function findAll()
    {
        $request = "SELECT * FROM article";
        $query = $this->db->query($request);
        return $query->fetchAll(\PDO::FETCH_CLASS, "App\Entity\Article");
    }

    public function add($entity)
    {
        $statement = "INSERT INTO article (title, content,createdAt ) 
        VALUES (:title, :content,NOW() )";

        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":title", $entity->getTitle());
        $prepare->bindValue(":content", $entity->getContent());
        $prepare->execute();
    }

    public function edit($entity)
    {
        $statement = "UPDATE INTO article (title, content ) 
        VALUES (:title, :content )";

        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":title", $entity->getTitle());
        $prepare->bindValue(":content", $entity->getContent());
        $prepare->execute();
    }


    public function delete($entity)
    {
        $stmt = "DELETE FROM article WHERE id = :id";
        $prepare = $this->db->prepare($stmt);
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute;
    }

    public function findFirst()
    {
        $stmt = "SELECT * FROM article ORDER BY id LIMIT 1";
        $prepare = $this->db->prepare($stmt);
        $prepare->execute;
    }
}
