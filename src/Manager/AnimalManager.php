<?php

namespace App\Manager;

use App\Entity\Animal;
use App\Manager\ManagerInterface;
use Vendor\database\Database;
use Vendor\database\Manager;

class AnimalManager extends Manager implements ManagerInterface
{
    private $table = "animal";

    /**
     * @param $entity
     * @return mixed
     * retourne un animal par son id
     */
    public function findOne($entity)
    {
        // TODO: Implement findOne() method.
        $statement = "SELECT * FROM $this->table WHERE id = :id LIMIT 1";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":id", $entity);
        $prepare->execute();
        $prepare->setFetchMode(\PDO::FETCH_CLASS, Animal::class);
        return $prepare->fetch();
    }

    /**
     * @param $entity
     * @return mixed
     * retourne un animal par son id
     */
    public function findLastTenPets()
    {
        // TODO: Implement findOne() method.
        $sql = $this->db->query("SELECT * FROM $this->table WHERE available = 1 order by id DESC LIMIT 10");
        return $sql->fetchAll(\PDO::FETCH_CLASS, Animal::class);
    }

    /**
     * @return array|mixed
     * Retourne tous les pokemonns
     */
    public function findAll()
    {
        // TODO: Implement findAll() method.
        $sql = $this->db->query("SELECT * FROM $this->table WHERE available = 1");
        return $sql->fetchAll(\PDO::FETCH_CLASS, Animal::class);
    }

    /**
     * @return array|mixed
     * Retourne tous les pokemonns
     */
    public function findAllAnimals()
    {
        // TODO: Implement findAll() method.
        $sql = $this->db->query("SELECT * FROM $this->table");
        return $sql->fetchAll(\PDO::FETCH_CLASS, Animal::class);
    }

    /**
     * @param $entity
     * @return mixed|void
     * ajout un animal dans la base de données
     */
    public function add($entity)
    {
        $statement = "INSERT INTO $this->table (name, nameSlug, type, race, weight, size, image, available) VALUE (:name, :nameSlug, :type, :race, :weight, :size, :image, :available)";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":name", $entity->getName());
        $prepare->bindValue(":nameSlug", $entity->getNameSlug());
        $prepare->bindValue(":type", $entity->getType());
        $prepare->bindValue(":race", $entity->getRace());
        $prepare->bindValue(":weight", $entity->GetWeight());
        $prepare->bindValue(":size", $entity->getSize());
        $prepare->bindValue(":image", $entity->getImage());
        $prepare->bindValue(":available", $entity->getAvailable());
        $prepare->execute();
        return $prepare->fetch();
    }


    /**
     * @param $entity
     * @return mixed|void
     * met à jour les infos d'un animal dans la base de données
     */
    public function edit($entity)
    {
        // TODO: Implement edit() method.
        $statement = "UPDATE $this->table 
                        SET name = :name, 
                        nameSlug = :nameSlug, 
                        type_id = :type, 
                        race_id = :race, 
                        weight = :weight, 
                        size = :size, 
                        rarity_id = :rarity, 
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
     * Supprime un animal de la base de données
     */
    public function delete($entity)
    {
        // TODO: Implement delete() method.
        $statement = "DELETE FROM $this->table WHERE id = :id";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":id", $entity);
        $prepare->execute();
        $prepare->setFetchMode(\PDO::FETCH_CLASS, Animal::class);
        return $prepare->fetch();
    }

    /**
     * @param entity
     * @return mixed
     * retourne les infos d'un animal en fonction de la recherche (à définir)
     */
    public function findFirst()
    {
        // TODO: Implement findFirst() method.
    }
}
