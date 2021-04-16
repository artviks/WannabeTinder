<?php


namespace App\Models;


class Person
{
    private string $name;
    private string $surname;
    private string $email;
    private ?string $password;

    public function __construct(string $email, string $password = null)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

}