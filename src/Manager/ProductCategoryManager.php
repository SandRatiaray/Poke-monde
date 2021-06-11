<?php
namespace App\Manager;

use App\Entity\ProductCategory;
use App\Manager\ManagerInterface;
use Vendor\database\Database;
use Vendor\database\Manager;

class ProductCategoryManager extends Manager implements ManagerInterface
{
    /**
     * @var entity
     * @return mixed
     * ajoute un enregistrement dans la table produit catégorie
     */
    public function add($entity)
    {
        $statement = "INSERT INTO user (name, nameSlug) 
                        VALUES (:name, :nameSlug)";

        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":name", $entity->getName());
        $prepare->bindValue(":nameSlug", $entity->getNameSlug());
        $prepare->execute();
    }

    /**
     * @var entity
     * @return mixed
     * permet de mettre à jour une categorie de produit
     */
    public function edit($entity)
    {
        $statement = "UPDATE productcategory SET 
                name = :name,
                nameSlug = :nameSlug";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":name", $entity->getName());
        $prepare->bindValue(":nameSlug", $entity->getNameSlug());
        $prepare->execute();
    }


    /**
     * @var entity 
     * @return mixed
     * supprime une catégorie de la base de données 
     */
    public function delete($entity)
    {
        $statement = "DELETE FROM productcategory WHERE id = :id";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute();
    }


    /**
     * @var entity
     * retourne les infos d'une catégorie 
     */
    public function findOne($entity)
    {
        $statement = "SELECT * FROM productcategory WHERE id = :id LIMIT 1";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":name", $entity->getName());
        $prepare->execute();
        return $prepare->fetch(\PDO::FETCH_CLASS, productcategory::class);
    }

    /**
     * @var 
     * retoure les infos du premier enregistrement de catégorie trouvé
     */
    public function findFirst()
    {
        $query = $this->db->query( "SELECT * FROM productcategory ORDER BY id = :id ASC LIMIT 1");
        return $query->fetch(\PDO::FETCH_CLASS, productcategory::class);
    }

    /**
     * @var
     * retourne toutes les catégories de produit
     */
    public function findAll()
    {
        $query = $this->db->query("SELECT * FROM productCategory");
        return $query->fetchAll(\PDO::FETCH_CLASS, productcategory::class);
    }
}