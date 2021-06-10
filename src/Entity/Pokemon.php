<?php

namespace App\Entity;

class Pokemon
{
    /**
     * @var int auto increment
     * représente l'identifiant du pokemon
     */
    private $id;

    /**
     * @var string
     * représente le nom du pokemon
     */
    private $name;

    /**
     * @var string
     * représente le slug du pokemon
     */
    private $nameSlug;

    /**
     * @var int
     * représente l'identifiant du type du pokemon
     */
    private $type;

    /**
     * @var int
     * représente l'identifiant de la race du pokemon
     */
    private $race;

    /**
     * @var int
     * représente l'identifiant de la rareté du pokemon
     */
    private $rarity;

    /**
     * @var float 
     * représente le poids du pokemon
     */
    private $weight;

    /**
     * @var float
     * représente la taille du pokemon
     */
    private $size;

    /**
     * @var string
     * représente l'image du pokemon
     */
    private $image;

    /**
     * @var bool
     * représente la disponibilité du pokemon (true ou false)
     */
    private $available;


    /**
     * @var entity
     * permet d'affecter les données de la table à l'objet grâce au setter.
     */
    public function hydrate(array $pokemon)
    {
        foreach ($pokemon as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     * retourne l'id du pokemon
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     * Retourne le nom du pokemon
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * Ajoute un nom au pokemon
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return String
     * retourne le slug du pokemon
     */
    public function getNameSlug()
    {
        return $this->nameSlug;
    }

    /**
     * @param mixed $nameSlug
     * ajoute un slug au pokemon
     */
    public function setNameSlug($nameSlug)
    {
        $this->nameSlug = $nameSlug;
    }

    /**
     * @return mixed
     * Retourne le type du pokemone
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * Ajout le type du pokemon
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     * retourne la race du pokemon
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * @param mixed $race
     * ajoute la race du pokemon
     */
    public function setRace($race)
    {
        $this->race = $race;
    }

    /**
     * @return mixed
     * retourne ne poids du pokemon
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     * ajoute le poids du pokemon
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     * retourne la taille du pokemon
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     * ajoute la taille du pokemon
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     * retourn la rareté du pokemon
     */
    public function getRarity()
    {
        return $this->rarity;
    }

    /**
     * @param mixed $rarity
     * ajoute la rareté du pokemon
     */
    public function setRarity($rarity)
    {
        $this->rarity = $rarity;
    }

    /**
     * @return mixed
     * retourn l'image du pokemon
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     * ajoute l'image du pokemon
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     * retourne la disponibilité du pokemon
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * @param mixed $available
     * ajoute la disponibilité du pokemon
     */
    public function setAvailable($available)
    {
        $this->available = $available;
    }
}
