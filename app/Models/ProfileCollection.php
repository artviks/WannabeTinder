<?php


namespace WTinder\Models;


class ProfileCollection
{
    private array $collection;

    public function add(Profile $profile): void
    {
        $this->collection[] = $profile;
    }

    public function getCollection(): array
    {
        return $this->collection;
    }
}