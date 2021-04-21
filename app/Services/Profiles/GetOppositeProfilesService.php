<?php


namespace WTinder\Services\Profiles;


use WTinder\Models\ProfileCollection;
use WTinder\Repositories\UsersRepositoryInterface;

class GetOppositeProfilesService
{
    private GetProfileService $getProfileService;
    private UsersRepositoryInterface $usersRepository;

    public function __construct(GetProfileService $getProfileService, UsersRepositoryInterface $usersRepository)
    {
        $this->getProfileService = $getProfileService;
        $this->usersRepository = $usersRepository;
    }

    public function execute(string $email): ProfileCollection
    {
        $user = $this->getProfileService->execute($email)->getUser();
        $profiles = new ProfileCollection();

        foreach ($this->usersRepository->getOppositeGender($user)->getCollection() as $user) {
            $profiles->add(
                $this->getProfileService->execute($user->getEmail())
            );
        }

        return $profiles;
    }
}