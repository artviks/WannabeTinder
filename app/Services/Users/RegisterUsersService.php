<?php


namespace WTinder\Services\Users;


use WTinder\Models\User;
use WTinder\Repositories\Database\MySQLUsersRepository;
use InvalidArgumentException;

class RegisterUsersService
{
    private MySQLUsersRepository $repository;

    public function __construct(MySQLUsersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(RegisterUsersRequest $request): void
    {
        if ($this->repository->getByEmail($request->getEmail()) === null)
        {
            throw new InvalidArgumentException(
                "User with {$request->getEmail()} already exists!");
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
