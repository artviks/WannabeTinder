<?php


namespace WTinder\Services\Images;


class UploadImageRequest
{
    private string $email;
    private string $fileName;
    private string $tmpName;

    public function __construct(string $email, string $fileName, string $tmpName)
    {
        $this->email = $email;
        $this->fileName = $fileName;
        $this->tmpName = $tmpName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function getTmpName(): string
    {
        return $this->tmpName;
    }
}