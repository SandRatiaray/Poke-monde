<?php


namespace App\Entity;


class PokemonType
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     * champs nom du type du pokemon comme feu, eau etc
     */
    private $name;

    /**
     * @var string
     * champs slug qui va permettre de personnaliser la route en fonction du pokemon choisis
     */
    private $nameSlug;

    /**
     * PokemonType constructor.
     * @param $name
     * @param $nameSlug
     */
    public function __construct($name, $nameSlug)
    {
        $this->name = $name;
        $this->nameSlug = $nameSlug;
    }

    /**
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
    public function setName($name): void
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
    public function setNameSlug($nameSlug): void
    {
        $this->nameSlug = $nameSlug;
    }

    /**
     * Hydrate
     * @param array $pokemonType
     */
    public function hydrate (array $pokemonType)
    {
        foreach ($pokemonType as $key => $value) {
            $method = "set". ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }
}