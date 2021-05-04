<?php


namespace WTinder\Services\Images;


use http\Exception\RuntimeException;
use WTinder\Models\Image;
use WTinder\Repositories\ImageDataRepositoryInterface;
use WTinder\Repositories\UsersRepositoryInterface;

class UploadImageService
{
    private const TARGET_DIR = __DIR__ . "./../../../public/Pictures/";
    private ImageDataRepositoryInterface $imageRepository;
    private UsersRepositoryInterface $usersRepository;

    public function __construct(
        ImageDataRepositoryInterface $imageRepository,
        UsersRepositoryInterface $usersRepository
    )
    {
        $this->imageRepository = $imageRepository;
        $this->usersRepository = $usersRepository;
    }

    public function execute(UploadImageRequest $request): void
    {
        $targetFile = self::TARGET_DIR . basename($request->getFileName());

        if (move_uploaded_file($tmpName, $targetFile))
        {
            $image = new Image($request->getFileName(), $targetFile);
            $user = $this->usersRepository->getBy($request->getEmail());
            $this->imageRepository->store($image, $user);

        } else {
            throw new \RuntimeException('File was not uploaded!');
        }
    }
}