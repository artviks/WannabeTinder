<?php


namespace WTinder\Repositories;


use WTinder\Models\Image;
use WTinder\Models\UserDTO;

interface ImageDataRepositoryInterface
{
    public function store(Image $image, UserDTO $user): void;

    public function getBy(UserDTO $user): Image;
}