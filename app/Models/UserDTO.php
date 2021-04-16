<?php

namespace WTinder\Models;


class UserDTO
{
    private string $name;
    private string $surname;
    private string $email;
    private string $id;

    public function __construct(string $id, string $name, string $surname, string $email)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getId(): string
    {
        return $this->id;
    }
}