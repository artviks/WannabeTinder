<?php


namespace WTinder\Repositories;


use WTinder\Models\UserHasImage;

interface UsersImagesRepositoryInterface
{
    public function store(UserHasImage $userImage): void;

    public function getImageId(string $userId): array;
}