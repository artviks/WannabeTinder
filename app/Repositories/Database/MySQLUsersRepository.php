<?php


namespace WTinder\Repositories\Database;


use PDO;
use WTinder\Models\UsersCollection;
use WTinder\Repositories\UsersRepositoryInterface;
use WTinder\Models\User;
use WTinder\Models\UserDTO;

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
            "INSERT INTO users (name, surname, email, gender, password) 
                    VALUES ('%s', '%s', '%s', '%s', '%s')",
            $user->getName(),
            $user->getSurname(),
            $user->getEmail(),
            $user->getGender(),
            $user->getPassword()
        );

        $this->pdo->exec($sql);
    }

    public function getBy(string $email, bool $password = false): ?UserDTO
    {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $statement = $this->pdo->query($sql);
        $user = $statement->fetch();

        if ($user) {
            return new UserDTO(
                $user['name'],
                $user['surname'],
                $user['email'],
                $user['gender'],
                $password ? $user['password'] : null,
            );
        }
        return null;
    }

    public function getOppositeGender(UserDTO $user): UserDTO
    {
        $gender = $user->getGender() === 'male' ? 'female' : 'male';

        $sql =
            "SELECT * FROM users 
                WHERE gender = '$gender' AND email NOT IN (
                    SELECT person 
                    FROM users_likes 
                    WHERE user_email = '{$user->getEmail()}'
                    )
                LIMIT 1"
        ;
        $statement = $this->pdo->query($sql);
        $oppositeUser = $statement->fetch();

        if (!$oppositeUser) {
            throw new \OutOfBoundsException('No more users to show!');
        }

        return new UserDTO(
            $oppositeUser['name'],
            $oppositeUser['surname'],
            $oppositeUser['email'],
            $oppositeUser['gender']
        );
    }
}