<?php


namespace WTinder\Repositories;


use WTinder\Models\Image;
use WTinder\Models\ImageDTO;

interface ImageDataRepositoryInterface
{
    public function store(Image $image): void;

    public function getBy(int $id): ImageDTO;
}