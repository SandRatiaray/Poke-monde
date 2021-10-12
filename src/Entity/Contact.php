<?php


namespace App\Entity;


class Contact
{

    private int $id;

    private string|null $message;

    private int|null $user;

    private int|null $animal;

    private \DateTime $created_at;

    public function __construct()
    {
        $this->created_at = new \DateTime('now');
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }


    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    public function getUser(): ?int
    {
        return $this->user;
    }

    public function setUser(?int $user): void
    {
        $this->user = $user;
    }

    public function getAnimal(): ?int
    {
        return $this->animal;
    }

    public function setAnimal(?int $animal): void
    {
        $this->animal = $animal;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * Hydrate
     * @param array $contact
     */
    public function hydrate(array $contact)
    {
        foreach ($contact as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}
