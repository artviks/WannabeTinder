<?php


namespace WTinder\Repositories\Database;


use PDO;
use WTinder\Models\UserDTO;
use WTinder\Models\UserUploadsImage;
use WTinder\Repositories\UsersImagesRepositoryInterface;

class MySQLUsersImagesRepository implements UsersImagesRepositoryInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function store(UserUploadsImage $userImage): void
    {
        $sql = sprintf(
            "INSERT INTO users_images (user_id, image_id) 
                    VALUES ('%s', '%s')",
            $userImage->getUserId(),
            $userImage->getImageId(),
        );

        $this->pdo->exec($sql);
    }

    public function getImageId(UserDTO $user): ?string
    {
        $sql = "SELECT * FROM users_images WHERE user_id = '{$user->getEmail()}'";
        $statement = $this->pdo->query($sql);
        $table = $statement->fetch();

        return $table['image_id'] ?? null;
    }
}