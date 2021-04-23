<?php


namespace WTinder\Services\Profiles;


use WTinder\Models\Profile;
use WTinder\Repositories\ImageDataRepositoryInterface;
use WTinder\Repositories\UsersRepositoryInterface;

class GetOppositeProfileService
{

    private UsersRepositoryInterface $usersRepository;
    private ImageDataRepositoryInterface $imageRepository;

    public function __construct
    (
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
        $oppositeUser = $this->usersRepository->getOppositeGender($user);
        $image = $this->imageRepository->getBy($oppositeUser);

        return new Profile($oppositeUser, $image);
    }
}