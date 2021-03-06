<?php


namespace WTinder\Services\Profiles;


use WTinder\Models\Profile;
use WTinder\Repositories\ImageDataRepositoryInterface;
use WTinder\Repositories\UsersRepositoryInterface;

class GetProfileService
{
    private UsersRepositoryInterface $usersRepository;
    private ImageDataRepositoryInterface $imageRepository;

    public function __construct(
        UsersRepositoryInterface $usersRepository,
        ImageDataRepositoryInterface $imageRepository
    )
    {
        $this->usersRepository = $usersRepository;
        $this->imageRepository = $imageRepository;
    }

    public function execute(string $email): Profile
    {
        $user = $this->usersRepository->getBy($email);
        $image = $this->imageRepository->getBy($user);

        if ($image === null) {
            return new Profile($user);
        }

        return new Profile($user, $image);
    }
}