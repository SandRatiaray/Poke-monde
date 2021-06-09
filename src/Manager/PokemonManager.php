<?php
namespace App\Manager;
use App\Entity\Pokemon;
use App\Manager\ManagerInterface;
use Vendor\database\Database;

class PokemonManager implements ManagerInterface
{
    private \PDO $db;
    private $table = "pokemon";

    public function __construct()
    {
        $db = new Database();
        $this->setDb($db->getDb());
    }

    private function setDb (\PDO $db){
        $this->db = $db;
    }

    /**
     * @return void
     * on vide la variable de base de données
     */
    public function __destruct()
    {
        $db = null;
    }

    /**
     * @param $entity
     * @return mixed
     * retourne un pokemon par son id
     */
    public function findOne($entity)
    {
        // TODO: Implement findOne() method.
        $statement = "SELECT * FROM $this->table WHERE id = :id LIMIT 1";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute();
        return $prepare->fetch(\PDO::FETCH_OBJ, Pokemon::class);
    }

    /**
     * @return array|mixed
     * Retourne tous les pokemonns
     */
    public function findAll()
    {
        // TODO: Implement findAll() method.
        $sql = $this->db->query("SELECT * FROM $this->table");
        return $sql->fetch(\PDO::FETCH_OBJ, Pokemon::class);
    }


    /**
     * @param $entity
     * @return mixed|void
     * ajout un pokemon dans la base de données
     */
    public function add($entity)
    {
        // TODO: Implement add() method.
        $statement = "INSERT INTO $this->table (name, nameSlug, type, race, weight, size, rarity, image, available) VALUE (:name, :nameSlug, :type, :race, :weight, :size, :rarity, :image, :available)";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":name", $entity->getName());
        $prepare->bindValue(":nameSlug", $entity->getNameSlug());
        $prepare->bindValue(":type", $entity->getType());
        $prepare->bindValue(":race", $entity->getRace());
        $prepare->bindValue(":weight", $entity->GetWeight());
        $prepare->bindValue(":size", $entity->getSize());
        $prepare->bindValue(":rarity", $entity->getRarity());
        $prepare->bindValue(":image", $entity->getImage());
        $prepare->bindValue(":available", $entity->getAvailable());
        $prepare->execute();
    }


    /**
     * @param $entity
     * @return mixed|void
     * met à jour les infos d'un pokemon dans la base de données
     */
    public function edit($entity)
    {
        // TODO: Implement edit() method.
        $statement = "UPDATE $this->table 
                        SET name = :name, 
                        nameSlug = :nameSlug, 
                        type = :type, 
                        race = :race, 
                        weight = :weight, 
                        size = :size, 
                        rarity = :rarity, 
                        image = :image, 
                        available = :available
                        WHERE id = :id";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":id", $entity->getId());
        $prepare->bindValue(":name", $entity->getName());
        $prepare->bindValue(":nameSlug", $entity->getNameSlug());
        $prepare->bindValue(":type", $entity->getType());
        $prepare->bindValue(":race", $entity->getRace());
        $prepare->bindValue(":weight", $entity->GetWeight());
        $prepare->bindValue(":size", $entity->getSize());
        $prepare->bindValue(":rarity", $entity->getRarity());
        $prepare->bindValue(":image", $entity->getImage());
        $prepare->bindValue(":available", $entity->getAvailable());
        $prepare->execute();
    }


    /**
     * @param $entity
     * @return mixed|void
     * Supprime un pokemon de la base de données
     */
    public function delete($entity)
    {
        // TODO: Implement delete() method.
        $statement = "DELETE FROM $this->table WHERE id = :id";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute();
    }

    /**
     * @param entity
     * @return mixed
     * retourne les infos d'un pokemon en fonction de la recherche (à définir)
     */
    public function findFirst()
    {
        // TODO: Implement findFirst() method.
    }
}