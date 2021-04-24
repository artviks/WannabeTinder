<?php


namespace WTinder\Services\Users;


use WTinder\Repositories\UsersLikesRepositoryInterface;
use WTinder\Repositories\UsersRepositoryInterface;

class FindUsersMatchService
{
    private UsersLikesRepositoryInterface $likesRepository;
    private UsersRepositoryInterface $usersRepository;

    public function __construct
    (
        UsersLikesRepositoryInterface $likesRepository,
        UsersRepositoryInterface $usersRepository
    )
    {
        $this->likesRepository = $likesRepository;
        $this->usersRepository = $usersRepository;
    }

    public function execute(string $email): array
    {
        $user = $this->usersRepository->getBy($email);
        return $this->likesRepository->getMatch($user);
    }
}