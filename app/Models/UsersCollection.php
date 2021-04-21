<?php


namespace WTinder\Models;


class UsersCollection
{
    private array $collection;

    public function add(UserDTO $user): void
    {
        $this->collection[] = $user;
    }

    public function getCollection(): array
    {
        return $this->collection;
    }
}