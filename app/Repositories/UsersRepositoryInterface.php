<?php


namespace WTinder\Repositories;


use WTinder\Models\User;
use WTinder\Models\UserDTO;
use WTinder\Models\UsersCollection;

interface UsersRepositoryInterface
{
    public function store(User $user): void;

    public function getByEmail(string $email): ?UserDTO;

    public function getOppositeGender(UserDTO $user): UsersCollection;
}