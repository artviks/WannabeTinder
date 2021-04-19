<?php


namespace WTinder\Models;


class Image
{
    private string $originalName;
    private string $relativePath;
    private string $id;

    public function __construct(string $originalName, string $relativePath, string $id = null)
    {
        $this->originalName = $originalName;
        $this->relativePath = $relativePath;
        $this->id = $id ?: uniqid('', true);
    }

    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    public function getRelativePath(): string
    {
        return $this->relativePath;
    }

    public function getId(): string
    {
        return $this->id;
    }
}