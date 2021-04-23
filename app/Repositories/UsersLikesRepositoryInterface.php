<?php


namespace WTinder\Repositories;


use WTinder\Models\UserDTO;
use WTinder\Models\UserUser;

interface UsersLikesRepositoryInterface
{
    public function save(UserUser $userUser): void;

    public function getLiked(UserDTO $user): array;
}