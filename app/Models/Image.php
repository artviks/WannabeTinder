<?php


namespace WTinder\Models;


class Image
{
    private string $originalName;
    private string $absolutePath;

    public function __construct(string $originalName, string $absolutePath)
    {
        $this->originalName = $originalName;
        $this->absolutePath = $absolutePath;
    }

    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    public function getRelativePath(): string
    {
        $parts = explode('/', $this->absolutePath);
        $parts = array_reverse($parts);

        return $parts[1] . '/' . $parts[0];
    }
}