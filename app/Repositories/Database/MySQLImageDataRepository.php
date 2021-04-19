<?php


namespace WTinder\Repositories\Database;


use PDO;
use WTinder\Models\Image;
use WTinder\Repositories\ImageDataRepositoryInterface;

class MySQLImageDataRepository implements ImageDataRepositoryInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function store(Image $image): void
    {
        $sql = sprintf(
            "INSERT INTO images (id, original_name, path) 
                    VALUES ('%s', '%s', '%s')",
            $image->getId(),
            $image->getOriginalName(),
            $image->getRelativePath()
        );

        $this->pdo->exec($sql);
    }

    public function getBy(string $id): Image
    {
        $sql = "SELECT * FROM images WHERE id = '$id'";
        $statement = $this->pdo->query($sql);
        $image = $statement->fetch();

        return new Image(
            $image['original_name'],
            $image['path'],
            $image['id']
        );
    }
}