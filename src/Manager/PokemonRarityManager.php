<?php


namespace App\Manager;


class PokemonRarityManager implements ManagerInterface
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
        $statement = "SELECT * FROM PokemonRarity WHERE id = :id LIMIT 1";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":name", $entity->getName());
        $prepare->execute();
        return $prepare->fetch(\PDO::FETCH_CLASS, PokemonRarity::class);
    }

    public function findAll()
    {
        $query = $this->db->query("SELECT * FROM PokemonRarity");
        return $query->fetchAll(\PDO::FETCH_CLASS, PokemonRarity::class);
    }

    public function add($entity)
    {
        $statement = "INSERT INTO PokemonRarity (name, nameSlug) 
        VALUES (:name , :nameSlug )";

        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":name", $entity->getName());
        $prepare->bindValue(":nameSlug", $entity->getNameSLug());
        $prepare->execute();
    }


    public function edit($entity)
    {
        // TODO: Implement edit() method.
        $statement = "UPDATE PokemonRarity SET 
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
        $sql = 'DELETE FROM PokemonRarity WHERE id = :id';
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute;
    }

    public function findFirst($entity)
    {
        // TODO: Implement findFirst() method.
        $statement = "SELECT * FROM PokemonRarity ORDER BY id = :id ASC LIMIT 1";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":name", $entity->getName());
        $prepare->execute();
        return $prepare->fetch(\PDO::FETCH_CLASS, PokemonRarity::class);
    }
}