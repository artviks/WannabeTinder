<?php


namespace WTinder\Models;


class Image
{
    private string $originalName;
    private string $absolutePath;
    private string $id;

    public function __construct(string $originalName, string $absolutePath, string $id = null)
    {
        $this->originalName = $originalName;
        $this->absolutePath = $absolutePath;
        $this->id = $id ?: uniqid('', true);
    }

    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    public function getRelativePath(): string
    {
        $parts = explode('/', $this->absolutePath);
        $parts = array_reverse($parts);

        return $parts[2] . '/' . $parts[1] . '/' . $parts[0];
    }

    public function getId(): string
    {
        return $this->id;
    }
}