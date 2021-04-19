<?php


namespace WTinder\Models;


class UserUploadsImage
{
    private string $userId;
    private string $imageId;

    public function __construct(string $userId, string $imageId)
    {
        $this->userId = $userId;
        $this->imageId = $imageId;
    }

    public function getImageId(): string
    {
        return $this->imageId;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }
}