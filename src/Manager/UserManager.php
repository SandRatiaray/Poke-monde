<?php
namespace App\Manager;
use App\Entity\User;
use App\Manager\ManagerInterface;
use Vendor\database\Database;

class UserManager implements ManagerInterface
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

    /**
     * Find one user by email
     * @param User $entity
     * @return mixed
     */
    public function findOne($entity)
    {
        $statement = "SELECT * FROM user WHERE email = :email LIMIT 1";
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":email", $entity->getEmail());
        $prepare->execute();
        return $prepare->fetch(\PDO::FETCH_CLASS, "App\Entity\User");
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
        $statement = "INSERT INTO user (lastname, firstname, email, password, address, zipcode, tel) 
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
                lastname = :lastname,
                firstname = :firstname,
                email = :email,
                password = :password,
                address = :address,
                zipcode = :zipcode,
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