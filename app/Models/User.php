<?php


namespace App\Models;


class User
{
    private string $name;
    private string $surname;
    private string $email;
    private string $password;

    public function __construct(string $name, string $surname, string $email, string $password)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->setPassword($password);
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

    public function setPassword(string $password): void
    {
        $passwordEncrypted = password_hash($password, PASSWORD_DEFAULT);
        if ($passwordEncrypted) {
            $this->password = $passwordEncrypted;
        }
    }
}