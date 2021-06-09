<?php


namespace App\Manager;

use Vendor\database\Database;
use App\Entity\PokemonRarity;
use Vendor\database\Manager;

class PokemonRarityManager extends Manager implements ManagerInterface
{
    /**
     * @param $entity
     * @return mixed
     *
     * requete qui permet de recuperer la rareté en fonction de l'id
     */
    public function findOne($entity)
    {
        $statement = "SELECT * FROM pokemonRarity WHERE id = :id LIMIT 1";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":name", $entity->getName());
        $prepare->execute();
        return $prepare->fetch(\PDO::FETCH_CLASS, PokemonRarity::class);
    }

    /**
     * @return array|mixed
     * requete qui recupère toutes les raretés
     */
    public function findAll()
    {
        $query = $this->db->query("SELECT * FROM pokemonRarity");
        return $query->fetchAll(\PDO::FETCH_CLASS, PokemonRarity::class);
    }

    /**
     * @param $entity
     * @return mixed|void
     *
     * requête qui permet de créer un nouveau champ de rareté
     */
    public function add($entity)
    {
        $statement = "INSERT INTO pokemonRarity (name, nameSlug) 
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
     * requête qui modifie un champ de rareté
     */
    public function edit($entity)
    {
        $statement = "UPDATE pokemonRarity SET 
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
     * requête qui supprime un champ rareté
     */
    public function delete($entity)
    {
        $sql = 'DELETE FROM pokemonRarity WHERE id = :id';
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute;
    }

    /**
     * @return mixed
     *
     * requête qui recupère la 1er champ rare en fonction de l'id
     */
    public function findFirst()
    {
        $query = $this->db->query( "SELECT * FROM pokemonRarity ORDER BY id = :id ASC LIMIT 1");
        return $query->fetch(\PDO::FETCH_CLASS, PokemonRarity::class);
    }
}