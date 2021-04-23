<?php


namespace WTinder\Repositories\Database;


use WTinder\Models\UserDTO;
use WTinder\Models\UserUser;
use WTinder\Repositories\UsersLikesRepositoryInterface;

class MySQLUsersLikesRepository implements UsersLikesRepositoryInterface
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function save(UserUser $userUser): void
    {
        $sql = sprintf(
            "INSERT INTO users_likes (user_email, person, liked) 
                    VALUES ('%s', '%s', '%s')",
            $userUser->getUser()->getEmail(),
            $userUser->getLikedUser()->getEmail(),
            $userUser->getChoice()
        );

        $this->pdo->exec($sql);
    }

    public function getLiked(UserDTO $user): array
    {
        $sql = "SELECT * FROM users_likes WHERE liked = 1 AND user_email = '{$user->getEmail()}'";
        $statement = $this->pdo->query($sql);

        return $statement->fetchAll();
    }
}