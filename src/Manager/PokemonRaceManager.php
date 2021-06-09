<?php

namespace App\Manager;

use App\Entity\PokemonRace;
use App\Manager\ManagerInterface;
use Vendor\database\Database;

class PokemonRaceManager implements ManagerInterface {

    private \PDO $db;
    private $table = "pokemonrace";


    public function __construct(){
        $db = new Database();
        $this->setDb($db->getDb());
    }

    /**
     * @return void
     * on vide la variable de base de données
     */
    public function __destruct()
    {
        $db = null;
    }

    private function setDb (\PDO $db){
        $this->db = $db;
    }

    /**
     * @param $entity
     * @return mixed
     * retourne une race de pokemon grâce à son id
     */
    public function findOne($entity)
    {
        $statement = "SELECT * FROM $this->table WHERE id = :id LIMIT 1";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute();
        return $prepare->fetch(\PDO::FETCH_CLASS, PokemonRace::class);
    }


    /**
     * @return array|mixed
     * retoure la liste de toutes les races de pokemon
     */
    public function findAll()
    {
        $query = $this->db->query("SELECT * FROM $this->table");
        return $query->fetchAll(\PDO::FETCH_OBJ, PokemonRace::class);
    }

    /**
     * @param $entity
     * @return mixed|void
     * Ajoute une race de pokemon
     */
    public function add($entity)
    {
        $statement = "INSERT INTO $this->table (name, nameslug) 
                        VALUES (:name, :nameslug)";

        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":name", $entity->getName());
        $prepare->bindValue(":nameslug", $entity->getNameSlug());
        $prepare->execute();
    }

    /**
     * @param $entity
     * @return mixed|void
     * Modifie la race de pokemon
     */
    public  function edit($entity)
    {$statement = "UPDATE $this->table 
                    SET name = :name 
                    nameslug = :nameslug 
                    WHERE id = :id LIMIT 1";

        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":name", $entity->getName());
        $prepare->bindValue(":nameslug", $entity->getNameSlug());
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute();
    }

    /**
     * @param $entity
     * @return mixed|void
     * Supprime la race de pokemon
     */
    public function delete($entity)
    {
        $statement = "DELETE FROM $this->table WHERE id = :id";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute();
    }

    public function findFirst()
    {
        // TODO: Implement findFirst() method.
    }
}