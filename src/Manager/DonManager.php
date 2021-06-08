<?php

namespace App\Manager;

use App\Manager\ManagerInterface;

class donsManager implements ManagerInterface
{

    public function findOne($entity)
    {
        $stmt = "SELECT * FROM Don WHERE id = :id";
        $prepare = $this->db->prepare($stmt);
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute;
    }

    public function findAll()
    {
        $request = "SELECT * FROM don";
        $query = $this->db->query($request);
        return $query->fetchAll(\PDO::FETCH_CLASS, "App\Entity\don");
    }

    public function add($entity)
    {
        $statement = "INSERT INTO Don (amount, user) 
        VALUES (:amount, :user)";

        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":amount", $entity->getamount());
        $prepare->bindValue(":user", $entity->getuser());
        $prepare->execute();
    }

    /**
     * Nécessaire ou pas? 
     */
    public function edit($entity)
    {
        $statement = "UPDATE INTO Don (amount, user ) 
        VALUES (:amount, :user )";

        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":amount", $entity->getamount());
        $prepare->bindValue(":user", $entity->getuser());
        $prepare->execute();
    }


    /**
     * nécéssaire ou pas?
     */
    public function delete($entity)
    {
        $stmt = "DELETE FROM Don WHERE id = :id";
        $prepare = $this->db->prepare($stmt);
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute;
    }
    
    /**
     * nécéssaire ou pas?
     */
    public function findFirst()
    {
        // TODO: Implement findFirst() method.
    }
}
