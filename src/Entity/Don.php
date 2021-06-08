<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Id;

class Don
{

    private $id;
    private $amount;
    private $user;

    public function __construct($id, $amount, $user)
    {
        $this->id = $id;
        $this->amount = $amount;
        $this->user = $user;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getAmount()
    {
        return $this->amount;
    }
    public function setAmount($amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }
    public function setUser($user): self
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Hydrater une entité (array => entity)
     * @param array $datas
     * @return mixed
     */
    public function hydrate(array $don)
    {
        foreach ($don as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}
