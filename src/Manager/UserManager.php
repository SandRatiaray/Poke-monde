<?php
namespace App\Manager;
use App\Entity\User;
use App\Manager\ManagerInterface;
use Vendor\database\Database;
use Vendor\database\Manager;

class UserManager extends Manager implements ManagerInterface
{
    /**
     * Find one user by email
     * @param User $entity
     * @return mixed
     */
    public function findOne($entity)
    {
        $statement = "SELECT * FROM user WHERE email = :email AND password = :password LIMIT 1";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":email", $entity->getEmail());
        $prepare->bindValue(":password", $entity->getPassword());
        $prepare->execute();
//        $prepare->setFetchMode(\PDO::FETCH_CLASS, User::class);
//        return $prepare->fetch();
        return $prepare->fetch(\PDO::FETCH_OBJ);
    }

    /**
     * Get all users
     * @return array|mixed
     */
    public function findAll()
    {
        $query = $this->db->query("SELECT * FROM user");
        return $query->fetchAll(\PDO::FETCH_CLASS, "App\Entity\User");
    }

    /**
     * Insert a new user
     * @param User $entity
     */
    public function add($entity)
    {
        $statement = "INSERT INTO user (last_name, first_name, email, password, address, zip_code, tel) 
                        VALUES (:lastname, :firstname, :email, :password, :address, :zipcode, :tel)";

        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":lastname", $entity->getLastName());
        $prepare->bindValue(":firstname", $entity->getFirstName());
        $prepare->bindValue(":email", $entity->getEmail());
        $prepare->bindValue(":password", $entity->getPassword());
        $prepare->bindValue(":address", $entity->getAddress());
        $prepare->bindValue(":zipcode", $entity->getZipCode());
        $prepare->bindValue(":tel", $entity->getTel());
        $prepare->execute();
    }

    /**
     * Edit a user by email
     * @param User $entity
     * @return mixed|void
     */
    public function edit($entity)
    {
        $statement = "UPDATE user SET 
                last_name = :lastname,
                first_name = :firstname,
                email = :email,
                password = :password,
                address = :address,
                zip_code = :zipcode,
                tel = :tel 
                WHERE email=:email LIMIT 1";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":lastname", $entity->getLastName());
        $prepare->bindValue(":firstname", $entity->getFirstName());
        $prepare->bindValue(":email", $entity->getEmail());
        $prepare->bindValue(":password", $entity->getPassword());
        $prepare->bindValue(":address", $entity->getAddress());
        $prepare->bindValue(":zipcode", $entity->getZipCode());
        $prepare->bindValue(":tel", $entity->getTel());
        $prepare->execute();
    }

    /**
     * Delete a user by email
     * @param User entity
     * @return mixed|void
     */
    public function delete($entity)
    {
        $statement = "DELETE FROM user WHERE email = :email";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":email", $entity->getEmail());
        $prepare->execute();
    }

    public function findFirst()
    {
        // TODO: Implement findFirst() method.
    }
}