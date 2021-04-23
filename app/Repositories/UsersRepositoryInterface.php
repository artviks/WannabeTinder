<?php


namespace WTinder\Repositories;


use WTinder\Models\User;
use WTinder\Models\UserDTO;
use WTinder\Models\UsersCollection;

interface UsersRepositoryInterface
{
    public function store(User $user): void;

    public function getBy(string $email, bool $password = false): UserDTO;

    public function getOppositeGender(UserDTO $user): UserDTO;
}