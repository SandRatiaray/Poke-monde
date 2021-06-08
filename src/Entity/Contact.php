<?php


namespace App\Entity;


class Contact
{
    /**
     * Auto increment
     * @var int
     */
    private int $id;
    /**
     * Message
     * @var string
     */
    private string $message;
    /**
     * User
     * @var int
     */
    private int $user;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return int
     */
    public function getUser(): int
    {
        return $this->user;
    }

    /**
     * @param int $user
     */
    public function setUser(int $user): void
    {
        $this->user = $user;
    }
    /**
     * Hydrate
     * @param array $contact
     */
    public function hydrate (array $contact)
    {
        foreach ($contact as $key => $value) {
            $method = "set". ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }
}