<?php


namespace WTinder\Services\Images;


use WTinder\Models\Image;
use WTinder\Models\UserHasImage;
use WTinder\Repositories\ImageDataRepositoryInterface;
use WTinder\Repositories\UsersImagesRepositoryInterface;

class UploadImageService
{
    private const TARGET_DIR = __DIR__ . "./../../../storage/pictures/";
    private const MAX_SIZE = 500000;
    private int $uploadOk = 1;
    private array $message = [];
    private ImageDataRepositoryInterface $imageRepository;
    private UsersImagesRepositoryInterface $usersImagesRepository;

    public function __construct(
        ImageDataRepositoryInterface $imageRepository,
        UsersImagesRepositoryInterface $usersImagesRepository)
    {
        $this->imageRepository = $imageRepository;
        $this->usersImagesRepository = $usersImagesRepository;
    }

    public function execute(string $name, string $tmpName, int $size): void
    {
        $targetFile = self::TARGET_DIR . basename($name);

        $this->isImage($tmpName);
        $this->exists($targetFile);
        $this->checkSize($size);
        $this->checkFormats($targetFile);

        if ($this->uploadOk === 0) {
            $this->message['status'] = "Sorry, your file was not uploaded.";
            return;
        }

        if (move_uploaded_file($tmpName, $targetFile)) {
            $this->message['status'] = "The file " . basename($name) . " has been uploaded.";

            $image = new Image($name, $targetFile);
            $this->imageRepository->store($image);
            $this->usersImagesRepository->store(
                new UserHasImage($_SESSION['auth_email'], $image->getId())
            );
        }
    }

    public function getMessage(): array
    {
        return $this->message;
    }

    private function isImage(string $tmpName): void
    {
        $check = getimagesize($tmpName);

        if ($check !== false) {
            $this->message['message'] = "File is an image - " . $check["mime"] . ".";
        } else {
            $this->message['error'] = "File is not an image.";
            $this->uploadOk = 0;
        }
    }

    private function exists(string $targetFile): void
    {
        if (file_exists($targetFile)) {
            $this->message['error'] = "Sorry, file already exists.";
            $this->uploadOk = 0;
        }
    }

    private function checkSize(int $size): void
    {
        if ($size > self::MAX_SIZE) {
            $this->message['error'] = "Sorry, your file is too large.";
            $this->uploadOk = 0;
        }
    }

    private function checkFormats(string $targetFile): void
    {
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if ($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg"
            && $imageFileType !== "gif") {
            $this->message['error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $this->uploadOk = 0;
        }
    }
}