<?php


namespace WTinder\Models;


class ProfileCollection
{
    private array $collection;

    public function add(Profile $user): void
    {
        $this->collection[] = $user;
    }

    public function getCollection(): array
    {
        return $this->collection;
    }
}