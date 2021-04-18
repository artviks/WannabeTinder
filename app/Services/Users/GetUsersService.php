<?php


namespace WTinder\Services\Users;


use WTinder\Models\UserDTO;
use WTinder\Repositories\UsersRepositoryInterface;

class GetUsersService
{
    private UsersRepositoryInterface $repository;

    public function __construct(UsersRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(string $email): UserDTO
    {
        return $this->repository->getByEmail($email);
    }
}