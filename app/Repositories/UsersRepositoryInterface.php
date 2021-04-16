<?php


namespace WTinder\Repositories;


use WTinder\Models\User;
use WTinder\Models\UserDTO;

interface UsersRepositoryInterface
{
    public function store(User $user): void;

    public function getByEmail(string $email): ?UserDTO;
}