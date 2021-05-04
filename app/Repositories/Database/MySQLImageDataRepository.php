<?php


namespace WTinder\Repositories\Database;


use PDO;
use WTinder\Models\Image;
use WTinder\Models\UserDTO;
use WTinder\Repositories\ImageDataRepositoryInterface;

class MySQLImageDataRepository implements ImageDataRepositoryInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function store(Image $image, UserDTO $user): void
    {
        $sql = sprintf(
            "INSERT INTO images (user_email, original_name, path) 
                    VALUES ('%s', '%s', '%s')",
            $user->getEmail(),
            $image->getOriginalName(),
            $image->getRelativePath()
        );

        $this->pdo->exec($sql);
    }

    public function getBy(UserDTO $user): Image
    {
        $sql = "SELECT * FROM images WHERE user_email = '{$user->getEmail()}'";
        $statement = $this->pdo->query($sql);
        $image = $statement->fetch();

        return new Image(
            $image['original_name'],
            $image['path']
        );
    }
}