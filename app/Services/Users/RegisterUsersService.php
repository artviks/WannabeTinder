<?php


namespace WTinder\Services\Users;


use WTinder\Models\User;
use WTinder\Repositories\UsersRepositoryInterface;

class RegisterUsersService
{
    private UsersRepositoryInterface $repository;

    public function __construct(UsersRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(RegisterUsersRequest $request): void
    {

        if ($this->repository->getByEmail($request->getEmail()))
        {
            throw new \InvalidArgumentException("{$request->getEmail()} already exists!");
        }

        $this->repository->store(
            new User(
                $request->getName(),
                $request->getSurname(),
                $request->getEmail(),
                $request->getPassword()
        ));
    }
}
