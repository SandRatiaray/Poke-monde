<?php


namespace App\Manager;

use Vendor\database\Database;
use App\Entity\PokemonType;
use Vendor\database\Manager;

class PokemonTypeManager extends Manager implements ManagerInterface
{
     /**
     * @param $entity
     * @return mixed
     *
     * requete qui permet de recuperer le type en fonction de l'id
     */
    public function findOne($entity)
    {
        $statement = "SELECT * FROM pokemonType WHERE id = :id LIMIT 1";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute();
        return $prepare->fetch(\PDO::FETCH_OBJ);
    }

    /**
     * @return array|mixed
     * requete qui recupère toutes les types
     */
    public function findAll()
    {
        $query = $this->db->query("SELECT * FROM pokemonType");
        return $query->fetchAll(\PDO::FETCH_CLASS, PokemonType::class);
    }

    /**
     * @param $entity
     * @return mixed|void
     *
     * requête qui permet de créer un nouveau champ de type
     */
    public function add($entity)
    {
        $statement = "INSERT INTO pokemonType (name, nameSlug) 
        VALUES (:name , :nameSlug )";

        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":name", $entity->getName());
        $prepare->bindValue(":nameSlug", $entity->getNameSLug());
        $prepare->execute();
    }


    /**
     * @param $entity
     * @return mixed|void
     *
     * requête qui modifie un champ de type
     */
    public function edit($entity)
    {
        // TODO: Implement edit() method.
        $statement = "UPDATE pokemonType SET 
                name = :name
                WHERE id=:id LIMIT 1";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":name", $entity->getName());
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute();
    }

    /**
     * @param $entity
     * @return mixed|void
     *
     * requête qui supprime un champ type
     */
    public function delete($entity)
    {
        // TODO: Implement delete() method.
        $sql = 'DELETE FROM pokemonType WHERE id = :id';
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute;
    }

    /**
     * @return mixed
     *
     * requête qui recupère la 1er champ type en fonction de l'id
     */
    public function findFirst()
    {
        $query = $this->db->query( "SELECT * FROM pokemonType ORDER BY id = :id ASC LIMIT 1");
        return $query->fetch(\PDO::FETCH_CLASS, PokemonType::class);
    }
}