<?php


namespace WTinder\Services\Profiles;


use WTinder\Models\Profile;
use WTinder\Repositories\ImageDataRepositoryInterface;
use WTinder\Repositories\UsersImagesRepositoryInterface;
use WTinder\Repositories\UsersRepositoryInterface;

class GetProfileService
{
    private UsersRepositoryInterface $usersRepository;
    private ImageDataRepositoryInterface $imageRepository;
    private UsersImagesRepositoryInterface $usersImagesRepository;

    public function __construct(
        UsersRepositoryInterface $usersRepository,
        ImageDataRepositoryInterface $imageRepository,
        UsersImagesRepositoryInterface $usersImagesRepository
    )
    {
        $this->usersRepository = $usersRepository;
        $this->imageRepository = $imageRepository;
        $this->usersImagesRepository = $usersImagesRepository;
    }

    public function execute(string $email): Profile
    {
        $user = $this->usersRepository->getByEmail($email);
        $imageId = $this->usersImagesRepository->getImageId($user);

        if ($imageId === null) {
            return new Profile($user);
        }

        return new Profile($user, $this->imageRepository->getBy($imageId));
    }
}