<?php


namespace WTinder\Repositories;


use WTinder\Models\Image;

interface ImageDataRepositoryInterface
{
    public function store(Image $image): void;

    public function getBy(string $id): Image;
}