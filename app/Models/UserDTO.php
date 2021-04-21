<?php

namespace WTinder\Models;


class UserDTO
{
    private string $name;
    private string $surname;
    private string $email;
    private string $gender;
    private ?string $password;

    public function __construct(
        string $name,
        string $surname,
        string $email,
        string $gender,
        string $password = null
    )
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->gender = $gender;
        $this->password = $password;
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

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }
}