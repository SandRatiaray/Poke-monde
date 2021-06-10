<?php

namespace App\Entity;

class PokemonRace
{
    /**
     * @var int
     * représente l'id de la race de pokemon
     */
    private $id;

    /**
     * @var string
     * représente le nom de la race de pokemon
     */
    private $name;

    /**
     * @var string 
     * représente le slug de la race de pokemon
     */
    private $nameSlug;

    /**
     * PokemonRace constructor.
     * @param $name
     * @param $nameSlug
     */
    public function __construct($name, $nameSlug)
    {
        $this->name = $name;
        $this->nameSlug = $nameSlug;
    }

    /**
     * @param array $pokemonRace
     */
    public function hydrate(array $pokemonRace)
    {
        foreach ($pokemonRace as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * retourne l'id de la race du pokemon
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getNameSlug()
    {
        return $this->nameSlug;
    }

    /**
     * @param mixed $nameSlug
     */
    public function setNameSlug($nameSlug)
    {
        $this->nameSlug = $nameSlug;
    }
}
