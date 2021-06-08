<?php


namespace App\Entity;


class PokemonRarity
{
    private $id;

    private $name;

    private $nameSlug;

    /**
     * PokemonRarity constructor.
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

}