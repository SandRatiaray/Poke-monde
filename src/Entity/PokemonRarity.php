<?php


namespace App\Entity;


/**
 * Class PokemonRarity
 * @package App\Entity
 */
class PokemonRarity
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     * champs nom de la rareté du pokemon comme rare, légendaire
     */
    private $name;

    /**
     * @var string
     * champs slug qui va permettre de personnaliser la route en fonction du pokemon choisis
     */
    private $nameSlug;

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
     * @param array $pokemonRarity
     */
    public function hydrate (array $pokemonRarity)
    {
        foreach ($pokemonRarity as $key => $value) {
            $method = "set". ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }
}