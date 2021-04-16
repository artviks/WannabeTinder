<?php


namespace WTinder\Repositories\Database;


use PDO;
use WTinder\Repositories\UsersRepositoryInterface;
use WTinder\Models\User;
use WTinder\Services\Users\UserDTO;

class MySQLUsersRepository implements UsersRepositoryInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function store(User $user): void
    {
        $sql = sprintf(
            "INSERT INTO users (name, surname, email, password) VALUES ('%s', '%s', '%s', '%s')",
            $user->getName(),
            $user->getSurname(),
            $user->getEmail(),
            $user->getPassword()
        );

        $this->pdo->exec($sql);
    }

    public function getByEmail(string $email): ?UserDTO
    {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $statement = $this->pdo->query($sql);
        $user = $statement->fetch();

        if(!$user) {
            return null;
        }

        return new UserDTO(
            $user['id'],
            $user['name'],
            $user['surname'],
            $user['email']
        );
    }
}