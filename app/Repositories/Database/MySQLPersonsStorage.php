<?php


namespace App\Repositories\Database;


use App\Repositories\PersonsStorageInterface;

class MySQLPersonsStorage implements PersonsStorageInterface
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }
}