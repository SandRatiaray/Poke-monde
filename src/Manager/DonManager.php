<?php

namespace App\Manager;

use Vendor\database\Database;
use App\Manager\ManagerInterface;
use Vendor\database\Manager;


class DonManager extends Manager implements ManagerInterface
{
    /**
     * Find one donation by id
     * @param Don $entity
     * @return mixed
     */
    public function findOne($entity)
    {
        $stmt = "SELECT * FROM don WHERE id = :id LIMIT 1";
        $prepare = $this->db->prepare($stmt);
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute();
    }

    /**
     * Get all donations
     * @return array|mixed
     */
    public function findAll()
    {
        $request = "SELECT * FROM don";
        $query = $this->db->query($request);
        return $query->fetchAll(\PDO::FETCH_CLASS, "App\Entity\don");
    }

    /**
     * Insert a new donation
     * @param Don $entity
     */
    public function add($entity)
    {
        $statement = "INSERT INTO don (amount, user_id) 
        VALUES (:amount, :user)";

        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":amount", $entity->getamount());
        $prepare->bindValue(":user", $entity->getuser());
        $prepare->execute();
    }

    /**
     * Edit a donation by id
     * @param Don $entity
     * @return mixed|void
     */
    public function edit($entity)
    {
        $statement = "UPDATE INTO don (amount, user ) 
        VALUES (:amount, :user )";

        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":amount", $entity->getamount());
        $prepare->bindValue(":user", $entity->getuser());
        $prepare->execute();
    }


    /**
     * Delete a donation by id
     * @param Don entity
     * @return mixed|void
     */
    public function delete($entity)
    {
        $stmt = "DELETE FROM don WHERE id = :id";
        $prepare = $this->db->prepare($stmt);
        $prepare->bindValue(":id", $entity->getId());
        $prepare->execute();
    }

    /**
     * Find the first Donation
     * @param Don entity
     * @return mixed|void
     */
    public function findFirst()
    {
        $stmt = "SELECT * FROM don ORDER BY id ASC LIMIT 1";
        $prepare = $this->db->prepare($stmt);
        $prepare->execute();
    }
}
