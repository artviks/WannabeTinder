<?php


namespace WTinder\Models;


class Profile
{
    private UserDTO $user;
    private ?Image $image;

    public function __construct(UserDTO $user, Image $image = null)
    {
        $this->user = $user;
        $this->image = $image;
    }

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function getUser(): UserDTO
    {
        return $this->user;
    }
}