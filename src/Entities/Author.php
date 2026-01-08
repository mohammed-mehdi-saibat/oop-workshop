<?php

declare(strict_types=1);

class Author
{
    protected int $id;
    protected string $name;
    protected ?string $email;

    public function __construct(int $id, string $name, ?string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email ?? null;
    }

    // GETTERS
    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getEmail(): ?string
    {
        return $this->email;
    }
    // GETTERS
    //SETTERS
    public function setEmail($email): void
    {
        if ($this->verifyEmail($email) && !empty($email)) {
            $this->email = $email;
        }
    }
    //SETTERS
    // VERIFY
    private function verifyEmail($email): bool
    {
        if (!empty($email)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return true;
            } else return false;
        }
        return false;
    }
    // VERIFY
}
