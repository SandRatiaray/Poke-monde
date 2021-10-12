<?php

namespace App\Entity;

class Animal
{

    private int $id;

    private string|null $name;

    private string|null $nameSlug;

    private string|null $type;

    private string|null $race;

    private int|float $weight;

    private int|float $size;

    private string|null $image;

    private bool|null $available = true;


    /**
     * permet d'affecter les données de la table à l'objet grâce au setter.
     */
    public function hydrate(array $animal)
    {
        foreach ($animal as $key => $value) {
            $method = "set" . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getNameSlug(): ?string
    {
        return $this->nameSlug;
    }

    public function setNameSlug(?string $nameSlug): void
    {
        $this->nameSlug = $nameSlug;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    public function getRace(): ?string
    {
        return $this->race;
    }

    public function setRace(?string $race): void
    {
        $this->race = $race;
    }

    public function getWeight(): float|int
    {
        return $this->weight;
    }

    public function setWeight(float|int $weight): void
    {
        $this->weight = $weight;
    }

    public function getSize(): float|int
    {
        return $this->size;
    }

    public function setSize(float|int $size): void
    {
        $this->size = $size;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    public function getAvailable(): ?bool
    {
        return $this->available;
    }

    public function setAvailable(?bool $available): void
    {
        $this->available = $available;
    }

}
