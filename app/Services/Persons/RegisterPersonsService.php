<?php


namespace App\Services\Persons;


use App\Repositories\PersonsStorageInterface;

class RegisterPersonsService
{
    private PersonsStorageInterface $storage;

    public function __construct(PersonsStorageInterface $storage)
    {
        $this->storage = $storage;
    }

    public function register(RegisterPersonsRequest $request): void
    {

    }
}