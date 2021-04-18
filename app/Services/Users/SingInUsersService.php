<?php


namespace WTinder\Services\Users;


use WTinder\Models\UserDTO;
use WTinder\Repositories\UsersRepositoryInterface;

class SingInUsersService
{
    private UsersRepositoryInterface $repository;
    private array $errors = [];

    public function __construct(UsersRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(SingInUsersRequest $request): void
    {
        $user = $this->repository->getByEmail($request->getEmail());

        if ($user === null) {
            $this->errors['email'] = "{$request->getEmail()} not found!";
            return;
        }

        if (!password_verify($request->getPassword(), $user->getPassword())) {
            $this->errors['password'] = "Invalid password";
            return;
        }

        $_SESSION['auth_email'] = $user->getEmail();
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}