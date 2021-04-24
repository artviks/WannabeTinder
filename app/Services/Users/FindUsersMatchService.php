<?php


namespace WTinder\Services\Users;


use WTinder\Models\ProfileCollection;
use WTinder\Repositories\UsersLikesRepositoryInterface;
use WTinder\Repositories\UsersRepositoryInterface;
use WTinder\Services\Profiles\GetProfileService;

class FindUsersMatchService
{
    private UsersLikesRepositoryInterface $likesRepository;
    private UsersRepositoryInterface $usersRepository;
    private GetProfileService $profileService;

    public function __construct
    (
        UsersLikesRepositoryInterface $likesRepository,
        UsersRepositoryInterface $usersRepository,
        GetProfileService $profileService

    )
    {
        $this->likesRepository = $likesRepository;
        $this->usersRepository = $usersRepository;
        $this->profileService = $profileService;
    }

    public function execute(string $email): ProfileCollection
    {
        $user = $this->usersRepository->getBy($email);
        $matches = $this->likesRepository->getMatch($user);
        $profiles = new ProfileCollection();

        foreach ($matches as $match) {
            $profiles->add(
                $this->profileService->execute($match['person'])
            );
        }
        return $profiles;
    }
}