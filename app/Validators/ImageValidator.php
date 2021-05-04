<?php


namespace WTinder\Validators;


class ImageValidator
{
    private const TARGET_DIR = __DIR__ . "./../../../public/Pictures/";
    private const MAX_SIZE = 500000;
    private array $errors = [];
    private array $file;

    public function __construct(array $file)
    {
        $this->file = $file;
    }

    public function validate(): void
    {
        $targetFile = self::TARGET_DIR . basename($this->file["name"]);

        $this->isImage($this->file["tmp_name"]);
        $this->exists($targetFile);
        $this->checkSize($this->file["size"]);
        $this->checkFormats($targetFile);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    private function isImage(string $tmpName): void
    {
        $check = getimagesize($tmpName);

        if ($check === false)
        {
            $this->errors[] = "File is not an image.";
        }
    }

    private function exists(string $targetFile): void
    {
        if (file_exists($targetFile))
        {
            $this->errors[] = "Sorry, file already exists.";
        }
    }

    private function checkSize(int $size): void
    {
        if ($size > self::MAX_SIZE)
        {
            $this->errors[] = "Sorry, your file is too large.";
        }
    }

    private function checkFormats(string $targetFile): void
    {
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if ($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg"
            && $imageFileType !== "gif")
        {
            $this->errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
    }
}