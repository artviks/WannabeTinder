<?php


namespace WTinder\Models;


class User
{
    private string $name;
    private string $surname;
    private string $email;
    private string $password;
    private string $gender;

    public function __construct(
        string $name,
        string $surname,
        string $email,
        string $gender,
        string $password
    )
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->setPassword($password);
        $this->gender = $gender;
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

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    private function setPassword(string $password): void
    {
        $passwordEncrypted = password_hash($password, PASSWORD_DEFAULT);
        if ($passwordEncrypted) {
            $this->password = $passwordEncrypted;
        }
    }
}