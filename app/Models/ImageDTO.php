<?php


namespace WTinder\Models;


class ImageDTO
{
    private string $originalName;
    private string $relativePath;
    private int $id;

    public function __construct(string $id, string $originalName, string $relativePath)
    {
        $this->originalName = $originalName;
        $this->relativePath = $relativePath;
        $this->id = $id;
    }

    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    public function getRelativePath(): string
    {
        return $this->relativePath;
    }

    public function getId(): int
    {
        return $this->id;
    }

}