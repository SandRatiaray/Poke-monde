<?php

namespace App\Manager;


use App\Entity\Article;
use Vendor\database\Database;
use App\Manager\ManagerInterface;
use Vendor\database\Manager;

class ArticleManager extends Manager implements ManagerInterface
{
    /**
     * Find one Article by id
     * @param Article $entity
     * @return mixed
     */
    public function findOne($entity)
    {
        $stmt = "SELECT * FROM article WHERE id = :id LIMIT 1";
        $prepare = $this->db->prepare($stmt);
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute();
    }

    /**
     * Get all articles
     * @return array|mixed
     */
    public function findAll()
    {
        $request = "SELECT * FROM article";
        $query = $this->db->query($request);
        return $query->fetchAll(\PDO::FETCH_CLASS, "App\Entity\Article");
    }

    /**
     * Insert a new Article
     * @param Article $entity
     */
    public function add($entity)
    {
        $statement = "INSERT INTO article (title, content,createdAt ) 
        VALUES (:title, :content,NOW() )";

        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":title", $entity->getTitle());
        $prepare->bindValue(":content", $entity->getContent());
        $prepare->execute();
    }

    /**
     * Edit an article by id
     * @param Don $entity
     * @return mixed|void
     */
    public function edit($entity)
    {
        $statement = "UPDATE INTO article (title, content ) 
        VALUES (:title, :content )";

        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":title", $entity->getTitle());
        $prepare->bindValue(":content", $entity->getContent());
        $prepare->execute();
    }

    /**
     * Delete an article by id
     * @param Article entity
     * @return mixed|void
     */
    public function delete($entity)
    {
        $stmt = "DELETE FROM article WHERE id = :id";
        $prepare = $this->db->prepare($stmt);
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute();
    }

    /**
     * Find the first article
     * @param Article entity
     * @return mixed|void
     */
    public function findFirst()
    {
        $stmt = "SELECT * FROM article ORDER BY id LIMIT 1";
        $prepare = $this->db->prepare($stmt);
        $prepare->execute();
    }
}
