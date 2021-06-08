<?php


namespace App\Manager;

use Vendor\database\Database;


class PokemonTypeManager implements ManagerInterface
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

    public function findOne($entity)
    {
        // TODO: Implement findOne() method.
        $statement = "SELECT * FROM PokemonType WHERE id = :id LIMIT 1";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":name", $entity->getName());
        $prepare->execute();
        return $prepare->fetch(\PDO::FETCH_CLASS, PokemonType::class);
    }

    public function findAll()
    {
        $query = $this->db->query("SELECT * FROM PokemonType");
        return $query->fetchAll(\PDO::FETCH_CLASS, PokemonType::class);
    }

    public function add($entity)
    {
        $statement = "INSERT INTO PokemonType (name, nameSlug) 
        VALUES (:name , :nameSlug )";

        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":name", $entity->getName());
        $prepare->bindValue(":nameSlug", $entity->getNameSLug());
        $prepare->execute();
    }


    public function edit($entity)
    {
        // TODO: Implement edit() method.
        $statement = "UPDATE PokemonType SET 
                name = :name
                WHERE id=:id LIMIT 1";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":name", $entity->getName());
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute();
    }

    public function delete($entity)
    {
        // TODO: Implement delete() method.
        $sql = 'DELETE FROM PokemonType WHERE id = :id';
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute;
    }

    public function findFirst()
    {
        // TODO: Implement findFirst() method.
    }
}