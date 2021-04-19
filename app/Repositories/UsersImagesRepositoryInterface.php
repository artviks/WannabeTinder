<?php


namespace WTinder\Repositories;


use WTinder\Models\UserDTO;
use WTinder\Models\UserUploadsImage;

interface UsersImagesRepositoryInterface
{
    public function store(UserUploadsImage $userImage): void;

    public function getImageId(UserDTO $user): ?string;
}